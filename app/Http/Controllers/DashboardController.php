<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Station;
use App\Models\TaskLog;
use App\Models\Engineer;
use App\Models\MainTask;
use App\Models\MainAlarm;
use App\Models\Department;
use App\Models\SectionTask;
use App\Models\TaskTimeline;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Models\TaskAttachment;
use App\Models\TaskConversions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\department_task_assignment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactFormNotification;

class DashBoardController extends Controller
{

    public function index()
    {
        $departmentId = Auth::user()->department_id;
        if (Auth::user()->role_id !== 2) {
            return redirect()->route('dashboard.userIndex');
        }
        //get tasks count for day , week and month
        // Get tasks count for a specific day
        // Get total tasks count for a specific day
        $totalTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereDate('created_at', now()->toDateString())->count();
        // Get completed tasks count for a specific day
        $completedTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereDate('created_at', now()->toDateString())
            ->where('isCompleted', "1")
            ->count();
        // Get total tasks count for the current week (assuming the week starts on Sunday)
        $totalTasksInWeek = department_task_assignment::where('department_id', $departmentId)
            ->whereBetween(DB::raw('DATE(created_at)'), [
                now()->startOfWeek(Carbon::SUNDAY)->toDateString(),
                now()->toDateString(),
            ])->count();
        // Get completed tasks count for the current week
        $completedTasksInWeek = department_task_assignment::where('department_id', $departmentId)
            ->whereBetween(DB::raw('DATE(created_at)'), [
                now()->startOfWeek(Carbon::SUNDAY)->toDateString(),
                now()->endOfWeek(Carbon::SUNDAY)->toDateString(),
            ])->where('isCompleted', "1")
            ->count();


        // Get total tasks count for the current month
        $totalTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)->count();

        // Get completed tasks count for the current month
        $completedTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)
            ->where('isCompleted', "1")
            ->count();
        $totalTasksAllTime = department_task_assignment::where('department_id', $departmentId)->count();
        $completedTasksAllTime = department_task_assignment::where('department_id', $departmentId)
            ->where('isCompleted', "1")->count();
        // Get the number of engineers in the user's department
        $engineersCount = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('department_id', Auth::user()->department_id);
        })
            ->count();
        // Get the number of section tasks in the user's department
        $sectionTasksCount = department_task_assignment::where('department_id', $departmentId)->count();
        $pendingTasksCount = department_task_assignment::where('department_id', $departmentId)->where('isCompleted', "0")->count();
        // Get the latest pending main tasks in the user's department, including those that were previously in the user's department
        $pendingTasks = department_task_assignment::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })
            ->where('status', "!=", 'converted')
            ->where('isCompleted', "0")->latest()->paginate(10);

        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->where('approved', 1)->latest()->paginate(10);

        // Get the number of main tasks that were previously in the user's department and are now in another department
        $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)
            ->Orwhere('source_department', $departmentId)->count();
        $incomingTasks =  TaskConversions::where('status', 'pending')
            ->where('destination_department', $departmentId)
            ->get();
        // $outgoingTasks = TaskConversions::whereHas('mainTask', function ($query) {
        //     $query->where('status', 'pending');
        // })->where('source_department', $departmentId)->get();
        $outgoingTasks = TaskConversions::whereHas('main_task', function ($query) {
            $query->where('isCompleted', '0');
        })
            ->where('source_department', $departmentId)
            ->where('tracked', 1)
            ->get();

        $currentWeekStart = now()->startOfWeek(Carbon::SUNDAY)->toDateString();
        $currentWeekEnd = now()->endOfWeek(Carbon::SUNDAY)->toDateString();
        $tasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as total_tasks_this_week')
            ->get();
        $completedTasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->where('isCompleted', '1')
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as completed_tasks_this_week')
            ->get();
        $pendingReportsCount = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->where('approved', 0)
            ->where('department_id', '!=', 1)
            ->count();

        $stationsCount = Station::all()->count();
        $usersPendingCount = User::where('approved', false)->where('department_id', $departmentId)->count();
        $departments = Department::all();

        return view('dashboard.index', compact('departments', 'usersPendingCount', 'stationsCount', 'pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
    }

    // return MainTask::with('station')->whereHas('station', function ($query) {
    //     $query->where('control', 'TOWN CONTROL CENTER');
    // })->get();
    // return  $control = MainTask::find(1)->station->control;
    // return  $station = Station::find(1)->main_task;
    // return Role::find(2)->user;
    // return Auth::user()->role->title;
    public function indexControl($control)
    {

        // Switch statement to set the control name based on the input
        switch ($control) {
            case 'JAHRA CONTROL CENTER':
                $controlName = 'JAHRA CONTROL CENTER';
                break;
            case 'SHUAIBA CONTROL CENTER':
                $controlName = 'SHUAIBA CONTROL CENTER';
                break;
            case 'NATIONAL CONTROL CENTER':
                $controlName = 'NATIONAL CONTROL CENTER';
                break;
            case 'TOWN CONTROL CENTER':
                $controlName = 'TOWN CONTROL CENTER';
                break;
            case 'JABRIYA CONTROL CENTER':
                $controlName = 'JABRIYA CONTROL CENTER';
                break;
            default:
                // If the input is not valid, return a 404 error
                abort(404);
                break;
        }
        $departmentId = Auth::user()->department_id;
        // Find the station with the specified control value
        // $station = Station::where('control', $controlName)->get();
        // if ($station) {
        //     // Retrieve department tasks by joining department_task_assignment with MainTask
        //     return  $departmentTasks = department_task_assignment::whereHas('main_task', function ($query) use ($station) {
        //         $query->where('station_id', $station->id);
        //     })->take(5)->get();
        // } else {
        //     // Handle the case where the specified control value is not found
        //     abort(404);
        // }

        ########
        $stations = Station::where('control', $controlName)->get();
        if ($stations->isEmpty()) {
            // Handle the case where no stations with the specified control value are found
            abort(404);
        }

        $stationIds = $stations->pluck('id')->toArray();
        // Retrieve department tasks by joining department_task_assignment with MainTask
        // return $departmentTasks = department_task_assignment::whereHas('main_task', function ($query) use ($stationIds) {
        //     $query->whereIn('station_id', $stationIds);
        // })->get();

        // return $departmentTasks;


        //get tasks count for day , week and month
        // Get tasks count for a specific day
        // Get total tasks count for a specific day
        $totalTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereDate('created_at', now()->toDateString())
            ->count();

        // Get completed tasks count for a specific day
        $completedTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereDate('created_at', now()->toDateString())
            ->where('isCompleted', 1)
            ->count();
        // Get total tasks count for the current week (assuming the week starts on Sunday)
        $totalTasksInWeek = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereBetween(DB::raw('DATE(created_at)'), [
                now()->startOfWeek(Carbon::SUNDAY)->toDateString(),
                now()->toDateString(),
            ])->count();
        // Get completed tasks count for the current week
        $completedTasksInWeek = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereBetween(DB::raw('DATE(created_at)'), [
                now()->startOfWeek(Carbon::SUNDAY)->toDateString(),
                now()->endOfWeek(Carbon::SUNDAY)->toDateString(),
            ])->where('isCompleted', 1)
            ->count();


        // Get total tasks count for the current month
        $totalTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereMonth('created_at', now()->month)->count();

        // Get completed tasks count for the current month
        $completedTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->whereMonth('created_at', now()->month)
            ->where('isCompleted', 1)
            ->count();
        $totalTasksAllTime = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->count();
        $completedTasksAllTime = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->where('isCompleted', 1)->count();
        // Get the number of engineers in the user's department
        $engineersCount = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('department_id', Auth::user()->department_id);
        })
            ->count();
        // Get the number of section tasks in the user's department
        $sectionTasksCount = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->count();
        $pendingTasksCount = department_task_assignment::where('department_id', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->where('isCompleted', "0")->count();
        // Get the latest pending main tasks in the user's department, including those that were previously in the user's department
        $pendingTasks = department_task_assignment::where('department_id', Auth::user()->department_id)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->where('status', 'pending')
            ->with('main_task') // Eager load the main_task relationship
            ->whereHas('main_task.station', function ($query) use ($controlName) {
                $query->where('control', $controlName);
            })
            ->paginate(10);

        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->where('isCompleted', '1')->where('approved', 1)->latest()->paginate(10);

        // Get the number of main tasks that were previously in the user's department and are now in another department
        $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)
            ->Orwhere('source_department', $departmentId)
            ->whereHas('main_task', function ($query) use ($stationIds) {
                $query->whereIn('station_id', $stationIds);
            })
            ->count();
        $incomingTasks = TaskConversions::whereHas('mainTask', function ($query) {
            $query->where('status', 'pending');
        })->whereHas('main_task', function ($query) use ($stationIds) {
            $query->whereIn('station_id', $stationIds);
        })
            ->where('destination_department', $departmentId)
            ->where('status', 'pending')
            ->get();
        // $outgoingTasks = TaskConversions::whereHas('mainTask', function ($query) {
        //     $query->where('status', 'pending');
        // })->where('source_department', $departmentId)->get();
        $outgoingTasks = TaskConversions::where('status', 'pending')->where('source_department', $departmentId)->get();
        $currentWeekStart = now()->startOfWeek(Carbon::SUNDAY)->toDateString();
        $currentWeekEnd = now()->endOfWeek(Carbon::SUNDAY)->toDateString();
        $tasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as total_tasks_this_week')
            ->get();
        $completedTasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->where('isCompleted', '1')
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as completed_tasks_this_week')
            ->get();
        $pendingReportsCount = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->where('approved', 0)
            ->where('department_id', '!=', 1)
            ->count();
        $stationsCount = Station::where('control', $controlName)->count();
        $usersPendingCount = User::where('approved', false)->where('department_id', $departmentId)->count();
        $departments = Department::all();
        return view('dashboard.index', compact('departments', 'usersPendingCount', 'stationsCount', 'pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
    }
    public function userIndex()
    {
        $pendingTasksCount = department_task_assignment::where('eng_id', Auth::user()->id)->where('isCompleted', '0')->count();
        $pendingTasks = department_task_assignment::where('eng_id', Auth::user()->id)->where('department_id', Auth::user()->department_id)->where('isCompleted', '0')->latest()->paginate(7, ['*'], 'page2');
        $completedTasksCount = SectionTask::where('eng_id', Auth::user()->id)->where('isCompleted', '1')->where('department_id', Auth::user()->department_id)->count();
        $completedTasks = SectionTask::where('department_id', Auth::user()->department_id)->where('isCompleted', '1')->latest()->paginate(7, ['*'], 'page2');
        $archiveCount = SectionTask::where('department_id', Auth::user()->department_id)->where('isCompleted', '1')->count();

        return view('dashboard.engineers.index', compact('pendingTasksCount', 'pendingTasks', 'completedTasksCount', 'completedTasks', 'archiveCount'));
    }
    public function add_task()
    {
        return view('dashboard.add_task');
    }
    public function engineerTaskPage($id)
    {
        $tasks = department_task_assignment::where('main_tasks_id', $id)->where('department_id', Auth::user()->department_id)->first();
        $files = TaskAttachment::where('main_tasks_id', $id)->get();
        if (!$tasks) {
            abort(404);
        }

        if ($tasks->eng_id != Auth::user()->id) {
            return view('dashboard.unauthorized');
        }
        return view('dashboard.engineerTaskPage2', compact('tasks', 'files'));
    }
    // public function submitEngineerReport3(Request $request, $id)
    // {
    //     $status_raidoBtn =  $request->input('action_take_status');
    //     // Retrieve the content from the 'action_take' input field
    //     $userText = $request->input('action_take');

    //     // Check if the user's content contains a style attribute for font size
    //     if (!preg_match('/style="font-size:\s*\d+px;"/', $userText)) {
    //         // If there's no font-size style, add the default font size
    //         $defaultFontSize = 'font-size:20px;';
    //         $actionTake = '<div><span style="' . $defaultFontSize . '">' . $userText . '</span><br></div>';
    //     }
    //     $date =  Carbon::now();
    //     $main_task = MainTask::findOrFail($id);
    //     $section_task = SectionTask::where('main_tasks_id', $id)->first();
    //     $taskConverted = TaskConversions::where('main_tasks_id', $id)
    //         ->where('source_department', Auth::user()->department_id)
    //         ->OrWhere('destination_department', Auth::user()->department_id)
    //         ->where('main_tasks_id', $id)
    //         ->first();
    //     $departmentTask = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('main_tasks_id', $id)
    //         ->first();
    //     if ($taskConverted) {
    //         $taskSoruce = department_task_assignment::where('department_id', $taskConverted->source_department)
    //             ->where('main_tasks_id', $id) //PSMD
    //             ->first();
    //         $taskDestination = department_task_assignment::where('department_id', $taskConverted->destination_department)
    //             ->where('main_tasks_id', $id) //Proteciton first time
    //             ->first();
    //         //check if Edara sent this tasks 
    //         if ($taskSoruce && $taskConverted->source_department != $departmentTask->department_id) {
    //             $taskSoruce->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "1"
    //             ]);
    //             $taskConverted->update([
    //                 'status' => 'waiting for approval',
    //             ]);
    //             // if senf from department 1
    //             if ($taskConverted->source_department == 1) {
    //                 SectionTask::create([
    //                     'main_tasks_id' => $id,
    //                     'department_id' => $taskConverted->source_department,
    //                     'eng_id' => Auth::user()->id,
    //                     'action_take' => $actionTake,
    //                     'main_alarm_id' => $main_task->main_alarm_id,
    //                     'status' => $status_raidoBtn,
    //                     'engineer-notes' => $request->notes,
    //                     'user_id' => Auth::user()->id,
    //                     'date' => $date,
    //                     'isCompleted' => "1",
    //                 ]);
    //             }
    //         }
    //         if ($taskConverted->source_department === Auth::user()->department_id) {
    //             $taskSoruce->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "1"
    //             ]);
    //             $taskConverted->update([
    //                 'status' => 'waiting for approval',
    //             ]);
    //         }
    //         if ($taskConverted->destination_department === Auth::user()->department_id) {
    //             $taskDestination->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "1"
    //             ]);
    //         }
    //         if ($taskDestination->status === 'completed' && $taskSoruce && $taskSoruce->status === 'completed') {
    //             $main_task->update([
    //                 'status' => $status_raidoBtn,

    //             ]);
    //         }
    //         SectionTask::create([
    //             'main_tasks_id' => $id,
    //             'department_id' => Auth::user()->department_id,
    //             'eng_id' => Auth::user()->id,
    //             'action_take' => $actionTake,
    //             'main_alarm_id' => $main_task->main_alarm_id,
    //             'status' => $status_raidoBtn,
    //             'engineer-notes' => $request->notes,
    //             'user_id' => Auth::user()->id,
    //             'date' => $date,
    //             'isCompleted' => "1"
    //         ]);
    //         TaskTimeline::create([
    //             'main_tasks_id' => $id,
    //             'department_id' => Auth::user()->department_id,
    //             'status' => 'Adding Report',
    //             'action' => "The Report has been added",
    //             'user_id' => Auth::user()->id
    //         ]);
    //         $departmentTask->update([
    //             'status' => 'completed',
    //         ]);
    //     } else {
    //         if (
    //             $status_raidoBtn == 'completed' || $status_raidoBtn == 'Responsibility of another entity'
    //             || $status_raidoBtn == 'Under warranty'
    //         ) {
    //             SectionTask::create([
    //                 'main_tasks_id' => $id,
    //                 'department_id' => Auth::user()->department_id,
    //                 'eng_id' => Auth::user()->id,
    //                 'action_take' => $request->action_take,
    //                 'main_alarm_id' => $main_task->main_alarm_id,
    //                 'status' =>  $status_raidoBtn,
    //                 'engineer-notes' => $request->notes ? $request->notes : $status_raidoBtn,
    //                 'user_id' => Auth::user()->id,
    //                 'date' => $date,
    //                 'isCompleted' => "1",
    //                 'approved' => 1,
    //             ]);
    //             TaskTimeline::create([
    //                 'main_tasks_id' => $id,
    //                 'department_id' => Auth::user()->department_id,
    //                 'status' => 'Adding Report',
    //                 'action' => "The Report has been added",
    //                 'user_id' => Auth::user()->id
    //             ]);
    //             $main_task->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "1"
    //             ]);
    //             $departmentTask->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "1"
    //             ]);
    //             TaskTimeline::create([
    //                 'main_tasks_id' => $id,
    //                 'department_id' => Auth::user()->department_id,
    //                 'status' => $status_raidoBtn,
    //                 'action' => "The status has been updated",
    //                 'user_id' => Auth::user()->id
    //             ]);
    //         } else {
    //             SectionTask::create([
    //                 'main_tasks_id' => $id,
    //                 'department_id' => Auth::user()->department_id,
    //                 'eng_id' => Auth::user()->id,
    //                 'action_take' => $request->action_take,
    //                 'main_alarm_id' => $main_task->main_alarm_id,
    //                 'status' => $status_raidoBtn,
    //                 'engineer-notes' => $request->notes ? $request->notes : $status_raidoBtn,
    //                 'user_id' => Auth::user()->id,
    //                 'date' => $date,
    //                 'isCompleted' => "0",
    //                 'approved' => 1,
    //             ]);
    //             TaskTimeline::create([
    //                 'main_tasks_id' => $id,
    //                 'department_id' => Auth::user()->department_id,
    //                 'status' => $status_raidoBtn,
    //                 'action' => "The status has been updated",
    //                 'user_id' => Auth::user()->id
    //             ]);
    //             $main_task->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "0"
    //             ]);
    //             $departmentTask->update([
    //                 'status' => $status_raidoBtn,
    //                 'isCompleted' => "0"
    //             ]);
    //         }
    //     }
    //     if ($request->hasfile('pic')) {
    //         foreach ($request->file('pic') as $file) {
    //             $name = $file->getClientOriginalName();
    //             $file->move(storage_path('app/public/attachments/' . $main_task->id), $name); // Store in the 'storage' directory
    //             $data[] = $name;
    //             $refNum = $request->refNum;

    //             $attachments = new TaskAttachment();
    //             $attachments->main_tasks_id = $main_task->id;
    //             $attachments->department_id = Auth::user()->department_id;
    //             $attachments->file = $name;
    //             $attachments->user_id = Auth::user()->id;
    //             $attachments->save();
    //         }
    //     }

    //     return redirect("/dashboard/user");
    // }

    public function submitEngineerReport(Request $request, $id)
    {
        // Step 1: Retrieve form input
        $actionStatus = $request->input('action_take_status');
        $actionContent = $request->input('action_take');

        try {
            // Step 2: Retrieve the main task
            $mainTask = MainTask::findOrFail($id);
            $taskConverted = TaskConversions::where('main_tasks_id', $id)
                ->where(function ($query) {
                    $query->where('source_department', Auth::user()->department_id)
                        ->orWhere('destination_department', Auth::user()->department_id);
                })
                ->first();


            $departmentTask = department_task_assignment::where('department_id', Auth::user()->department_id)
                ->where('main_tasks_id',  $mainTask->id)
                ->first();

            if ($taskConverted) {
                // Step 3: Handle the converted task
                $this->handleConvertedTask($mainTask, $taskConverted, $actionStatus, $actionContent, $request, $departmentTask);
            } else {
                // Step 4: Handle the non-converted task
                $this->handleNonConvertedTask($mainTask, $actionStatus, $actionContent, $request, $departmentTask);
            }

            // Step 5: Handle file uploads
            $this->handleFileUploads($request, $mainTask);

            // Step 6: Redirect the user to the appropriate page
            return redirect("/dashboard/user");
        } catch (\Exception $e) {
            // Step 7: Handle any exceptions or errors
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    private function handleConvertedTask($mainTask, $taskConverted, $actionStatus, $actionContent, $request, $departmentTask)
    {
        // Calculate isCompleted based on $actionStatus
        $isCompleted = in_array($actionStatus, ['completed', 'Responsibility of another entity', 'Under warranty']) ? '1' : '0';
        // Step 1: Retrieve source and destination department tasks
        $taskSource = department_task_assignment::where('department_id', $taskConverted->source_department)
            ->where('main_tasks_id', $mainTask->id)
            ->first();
        $taskDestination = department_task_assignment::where('department_id', $taskConverted->destination_department)
            ->where('main_tasks_id', $mainTask->id)
            ->first();
        // Step 2: Handle tasks based on conditions
        if ($taskSource && $taskConverted->source_department != $departmentTask->department_id) {
            // Task is from source department and not currently assigned to the current department
            $taskSource->update([
                'status' => $actionStatus,
                'isCompleted' =>  $isCompleted
            ]);
            $taskConverted->update([
                'status' =>  $isCompleted ? 'waiting for approval' : $actionStatus,
            ]);

            // If source department is 1, create a SectionTask
            if ($taskConverted->source_department == 1) {
                SectionTask::create([
                    'main_tasks_id' => $mainTask->id,
                    'department_id' => $taskConverted->source_department,
                    'eng_id' => Auth::user()->id,
                    'action_take' => $actionContent,
                    'main_alarm_id' => $mainTask->main_alarm_id,
                    'status' => $actionStatus,
                    'engineer-notes' => $request->notes ? $request->notes : $actionStatus,
                    'user_id' => Auth::user()->id,
                    'date' => now(),
                    'isCompleted' => $isCompleted,
                ]);
            }
        }

        if ($taskConverted->source_department === Auth::user()->department_id) {
            // Task is assigned to the current department
            $taskSource->update([
                'status' => $actionStatus,
                'isCompleted' => $isCompleted
            ]);
            $taskConverted->update([
                'status' =>  $isCompleted ? 'waiting for approval' : $actionStatus,
            ]);
        }

        if ($taskConverted->destination_department === Auth::user()->department_id) {
            // Task is assigned to the current department
            $taskDestination->update([
                'status' => $actionStatus,
                'isCompleted' =>  $isCompleted
            ]);
        }

        if ($taskDestination->status === 'completed' && $taskSource && $taskSource->status === 'completed') {
            // If both source and destination tasks are completed, update the main task
            $mainTask->update([
                'status' => $actionStatus,
            ]);
        }

        // Step 3: Create a SectionTask for the current department
        SectionTask::create([
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'eng_id' => Auth::user()->id,
            'action_take' => $actionContent,
            'main_alarm_id' => $mainTask->main_alarm_id,
            'status' => $actionStatus,
            'engineer-notes' => $request->notes,
            'user_id' => Auth::user()->id,
            'date' => now(),
            'isCompleted' =>  $isCompleted
        ]);

        // Step 4: Create a TaskTimeline entry for adding the report
        TaskTimeline::create([
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'status' => 'Adding Report',
            'action' => "The Report has been added",
            'user_id' => Auth::user()->id
        ]);
        // Step 5: Update the department task status to 'completed'
        $departmentTask->update([
            'status' => 'completed',
        ]);

        // Continue with other relevant tasks and updates
        if ($isCompleted) {
            $this->logTaskCompletion($departmentTask, $actionStatus);
        }
    }


    /**
     * Handle a non-converted task, including creating a SectionTask, updating the main task,
     * and updating the department task.
     *
     * @param MainTask $mainTask The main task being handled
     * @param string $actionStatus The status of the action
     * @param string $actionContent The content of the action
     * @param Illuminate\Http\Request $request The HTTP request
     * @param DepartmentTask $departmentTask The department task related to the main task
     */
    private function handleNonConvertedTask($mainTask, $actionStatus, $actionContent, $request, $departmentTask)
    {
        // Determine if the task is completed based on its status
        $isCompleted = in_array($actionStatus, ['completed', 'Responsibility of another entity', 'Under warranty']) ? '1' : '0';
        // 'approved' is set to 1
        $approved = 1;
        // Data to create a new SectionTask
        $sectionTaskData = [
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'eng_id' => Auth::user()->id,
            'action_take' => $request->action_take,
            'main_alarm_id' => $mainTask->main_alarm_id,
            'status' => $actionStatus,
            'engineer-notes' => $request->notes ? $request->notes : $actionStatus,
            'user_id' => Auth::user()->id,
            'date' => now(),
            'isCompleted' => $isCompleted,
            'approved' => $approved,
        ];

        // Create a new SectionTask record
        SectionTask::create($sectionTaskData);

        // Create a task timeline entry to indicate the report has been added
        TaskTimeline::create([
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'status' => 'Adding Report',
            'action' => 'The Report has been added',
            'user_id' => Auth::user()->id,
        ]);

        // Prepare updates for the main task and department task
        $mainTaskUpdates = [
            'status' => $actionStatus,
            'isCompleted' => $isCompleted,
        ];

        $departmentTaskUpdates = [
            'status' => $actionStatus,
            'isCompleted' => $isCompleted,
        ];
        if ($mainTask->main_alarm->id == 1) {
            $this->logTaskCompletion($departmentTask, $actionStatus);
        }
        // Create a task log entry to track the completion time


        // Update the main task and department task with the prepared updates
        $this->updateTaskAndDepartmentTask($mainTask, $departmentTask, $mainTaskUpdates, $departmentTaskUpdates);
    }

    /**
     * Update a main task and its related department task with the specified updates.
     *
     * @param MainTask $mainTask The main task to update
     * @param DepartmentTask $departmentTask The related department task to update
     * @param array $mainTaskUpdates The updates for the main task
     * @param array $departmentTaskUpdates The updates for the department task
     */
    private function updateTaskAndDepartmentTask($mainTask, $departmentTask, $mainTaskUpdates, $departmentTaskUpdates)
    {
        // Update the main task with the provided updates
        $mainTask->update($mainTaskUpdates);

        // Update the related department task with the provided updates
        $departmentTask->update($departmentTaskUpdates);

        // Create a task timeline entry to indicate the status update
        TaskTimeline::create([
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'status' => $mainTaskUpdates['status'],
            'action' => 'The status has been updated',
            'user_id' => Auth::user()->id,
        ]);
    }



    private function handleFileUploads($request, $mainTask)
    {
        if ($request->hasfile('pic')) {
            foreach ($request->file('pic') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path('app/public/attachments/' . $mainTask->id), $name); // Store in the 'storage' directory
                $data[] = $name;
                $refNum = $request->refNum;

                $attachments = new TaskAttachment();
                $attachments->main_tasks_id = $mainTask->id;
                $attachments->department_id = Auth::user()->department_id;
                $attachments->file = $name;
                $attachments->user_id = Auth::user()->id;
                $attachments->save();
            }
        }
    }
    private function logTaskCompletion($mainTask, $actionStatus)
    {


        $user = Auth::user();
        $assignedTime = Carbon::parse($mainTask->created_at);
        $completedTime = now();
        $timeTakenInMinutes = $assignedTime->diffInMinutes($completedTime);
        $taskType = $mainTask->is_emergency;
        if ($taskType === TaskLog::TASK_TYPE_NORMAL) {
            // Normal task
            if ($actionStatus !== 'First Draft') {
                // Check if it's late based on the time taken
                $isLate = $timeTakenInMinutes > (24 * 60);
            }
        } elseif ($taskType === TaskLog::TASK_TYPE_EMERGENCY) {
            // Emergency task
            if ($actionStatus !== 'First Draft') {
                // Check if it's late based on the time taken
                $isLate = $timeTakenInMinutes > (2 * 60);
            }
        }
        // Check if it's a normal task and if it's late

        TaskLog::create([
            'task_id' => $mainTask->id,
            'user_id' => $user->id,
            'task_type' => TaskLog::TASK_TYPE_NORMAL,
            'assigned_time' => $assignedTime,
            'completed_time' => $completedTime,
            'time_taken' => $timeTakenInMinutes,
            'is_late' => $isLate,

        ]);
    }
    public function reportDepartment($main_task_id, $department_id)
    {
        $section_task = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('department_id', $department_id)
            ->where('isCompleted', "1")
            ->first();
        $shared_reports_count = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->count();
        $sections_tasks = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->get();
        $files_count = TaskAttachment::where('main_tasks_id', $main_task_id)->where('department_id', $department_id)->count();
        $files = TaskAttachment::where('main_tasks_id', $main_task_id)->where('department_id', $department_id)->get();
        $departments = Department::all();
        return view('dashboard.reportPage2', compact('departments', 'section_task', 'sections_tasks', 'shared_reports_count', 'files', 'files_count'));
    }
    public function reportPage($id)
    {
        $section_task = SectionTask::findOrFail($id);
        $department_id = Auth::user()->department_id;
        $shared_reports_count = SectionTask::where('main_tasks_id', $section_task->main_tasks_id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->count();
        $sections_tasks = SectionTask::where('main_tasks_id', $section_task->main_tasks_id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->get();
        $files_count = TaskAttachment::where('main_tasks_id', $section_task->main_tasks_id)->where('department_id', $department_id)->count();
        $files = TaskAttachment::where('main_tasks_id', $section_task->main_tasks_id)->where('department_id', $department_id)->get();
        $departments = Department::all();
        return view('dashboard.reportPage2', compact('departments', 'section_task', 'sections_tasks', 'shared_reports_count', 'files', 'files_count'));
    }
    public function pendingReports()
    {
        $tasks = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->where('approved', 0)
            ->where('department_id', '!=', 1)
            ->paginate(6);
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $reports = [];
        foreach ($tasks as $task) {
            if ($task->isCompleted == 1) {
                $taskReports = SectionTask::where('main_tasks_id', $task->main_tasks_id)
                    ->where('department_id', $task->department_id)
                    ->get();

                // Append the reports for this task to the $reports array
                $reports = array_merge($reports, $taskReports->toArray());
            }
        }
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'reports'));
    }
    public function requestToUpdateReport($main_task_id)
    {
        $section_task = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->first();

        return view('dashboard.reportPageEdit', compact('section_task'));
    }
    public function pendingUsers()
    {
        $pendingUsers = User::where('department_id', Auth::user()->department_id)
            ->where('approved', false)->get();
        return view('dashboard.users.pendingUsers', compact('pendingUsers'));
    }


    public function updateReport(Request $request, $main_task_id)
    {
        $actionTake = $request->input('action_take');

        $engineerReports = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('eng_id', Auth::user()->id)
            ->where('isCompleted', "1")
            ->get();
        foreach ($engineerReports as $report) {
            $report->action_take = $actionTake; // Corrected the assignment operator from => to =
            $report->approved = false;
            $report->save(); // Save the updated report

        }
        return redirect()->back(); // Redirect back after processing
    }
    public function approveReports($id)
    {
        $report = SectionTask::findOrFail($id);
        $approve_value = $report->approved;
        $mainTasks = MainTask::where('id', $report->main_tasks_id)->first();
        $sharedTask = TaskConversions::where('main_tasks_id', $report->main_tasks_id)
            ->where(function ($query) {
                $query->where('destination_department', Auth::user()->department_id);
            })
            ->first();


        if (Auth::user()->department_id === $report->department_id) {
            $report->update([
                'approved' => !$approve_value
            ]);
            if ($sharedTask) {
                $sharedTaskReport =  SectionTask::where('department_id', $sharedTask->source_department)
                    ->where('main_tasks_id', $report->main_tasks_id)
                    ->where('isCompleted', "1")
                    ->where('approved', "0")
                    ->first();
                if ($sharedTaskReport) {
                    $sharedTaskReport->update([
                        'approved' => "1"
                    ]);
                    $sharedTask->update([
                        'tracked' => 1
                    ]);
                }
                $sharedTask->update([
                    'status' => 'completed',
                ]);
            } else {
                $mainTasks->update([
                    'isCompleted' => "1"
                ]);
            }
            return back();
        }
    }
    // public function showTasks($status)
    // {
    //     $stations = Station::all();
    //     $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
    //     $currentMonth = Carbon::now()->month;
    //     $isAdmin = Auth()->user()->role->title == 'Admin';
    //     $tasks = $isAdmin ? $this->getAdminTasks($status, $currentMonth) : $this->getEngineerTasks($status);
    //     $reports = [];
    //     foreach ($tasks as $task) {
    //         if ($task->isCompleted == 1) {
    //             $taskReports = SectionTask::where('main_tasks_id', $task->main_tasks_id)
    //                 ->where('department_id', $task->department_id)
    //                 ->where('isCompleted', "1")
    //                 ->get();

    //             // Append the reports for this task to the $reports array
    //             $reports = array_merge($reports, $taskReports->toArray());
    //         }
    //     }
    //     return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status', 'reports'));
    // }
    public function showTasks($status)
    {
        $isAdmin = Auth::user()->role->title == 'Admin';
        $currentMonth = Carbon::now()->month;
        $departmentId = Auth::user()->department_id;

        $stations = Station::all();
        $engineers = Engineer::where('department_id', $departmentId)->get();

        $tasks = $isAdmin ? $this->getAdminTasks($status, $currentMonth) : $this->getEngineerTasks($status);

        $taskIds = $tasks->pluck('id')->toArray();

        $reports = SectionTask::whereIn('main_tasks_id', $taskIds)
            ->where('department_id', $departmentId)
            ->where('isCompleted', 1)
            ->get();

        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status', 'reports'));
    }

    public function viewTask($id)
    {
        $departmentId = Auth::user()->department_id;

        $stations = Station::all();
        $engineers = Engineer::where('department_id', $departmentId)->get();

        $tasks = department_task_assignment::where('id', $id)->paginate(6);
        $status = null; // You can set a default status here if needed.
        $reports = null; // You can set a default value for reports here if needed.

        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status', 'reports'));
    }

    // public function viewTask($id)
    // {
    //     $stations = Station::all();
    //     $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
    //     $tasks = department_task_assignment::where('id', $id)->paginate(6);
    //     // $tasks = MainTask::where('id', $task->main_tasks_id)->get();
    //     $status = null;
    //     $reports = null;
    //     return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status', 'reports'));
    // }
    public function ShowTasksEngineer($status)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $currentMonth = Carbon::now()->month;
        $tasks = $this->getEngineerTasks($status);
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status'));
    }

    private function getAdminTasks($status, $currentMonth)
    {
        switch ($status) {
            case 'pending':
                return department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->where('status', 'pending')
                    ->latest()->paginate(6);

            case 'completed':
                return department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->where('isCompleted', "1")
                    ->latest()->paginate(6);

            case 'all':
                return department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->whereMonth('created_at', $currentMonth)->latest()->paginate(6);
            case 'mutual-tasks':
                return TaskConversions::where('source_department', Auth::user()->department_id)->orWhere('destination_department', Auth::user()->department_id)->latest()->paginate(6);;

            default:
                abort(403);
        }
    }
    private function getEngineerTasks($status)
    {
        switch ($status) {
            case 'pending':
                return department_task_assignment::where('eng_id', Auth::user()->id)
                    ->where('status', 'pending')
                    ->paginate(6);
            case 'completed':
                return department_task_assignment::where('eng_id', Auth::user()->id)
                    ->where('department_id', Auth::user()->department_id)
                    ->where('status', 'completed')
                    ->latest()->paginate(6);
            case 'all':
                return department_task_assignment::where('eng_id', Auth::user()->id)
                    ->latest()->paginate(6);
            default:
                abort(403);
        }
    }

    public function searchStation(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $station = Station::where('SSNAME', $request->station)->first();
        $tasks = department_task_assignment::join('main_tasks', 'department_task_assignment.main_tasks_id', '=', 'main_tasks.id')
            ->where('department_task_assignment.department_id', Auth::user()->department_id)
            ->where('main_tasks.station_id', $station->id)
            ->latest('department_task_assignment.created_at') // Specify the table for ordering
            ->paginate(6);


        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }
    public function engineerTasks(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $engineer = User::where('name', $request->engineer)->first();;
        $tasks = department_task_assignment::where('department_id', Auth::user()->department_id)
            ->where('eng_id', $engineer->id)
            ->latest()->paginate(6);
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }
    public function editTask($id)
    {
        $main_task = MainTask::findOrFail($id);
        $section_task = SectionTask::where('main_tasks_id', $id)->first();
        return view('dashboard.edit_task', compact('main_task', 'section_task'));
    }
    public function archive()
    {
        $currentMonth = Carbon::now()->month;
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $tasks = SectionTask::where('department_id', Auth::user()->department_id)->where('status', 'completed')->paginate(6);
        return view('dashboard.archive', compact('tasks', 'stations', 'engineers'));
    }
    public function searchArchive(Request $request)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $query = SectionTask::query();
        $query->where('department_id', Auth::user()->department_id)
            ->where('status', 'completed');

        if ($request->has('station_code') && !empty($request->station_code)) {
            $station = Station::where('SSNAME', $request->station_code)->pluck('id')->first();
            $query->whereHas('main_task', function ($query) use ($station) {
                $query->where('station_id', $station);
            });
        }
        if ($request->has('equip') && $request->equip !== -1  && !empty($request->equip) && $request->equip !== 'Please select Equip') {
            $equip = $request->equip;
            $query->whereHas('main_task', function ($query) use ($equip) {
                $query->where('equip_number', $equip);
            });
        }
        if ($request->has('engineer') && $request->engineer != ''  && !empty($request->engineer)) {
            $engineer = User::where('name', $request->engineer)->pluck('id')->first();
            $query->where('eng_id', $engineer);
        }
        if ($request->has('task_Date') && $request->has('task_Date2')) {
            try {
                $startDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('task_Date'))->format('Y-m-d');
                $endDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('task_Date2'))->format('Y-m-d');
                $query->whereBetween('date', [$startDate, $endDate]);
            } catch (\Exception $e) {
                // handle the error here
            }
        }
        $tasks = $query->paginate(6);
        return view('dashboard.archive', compact('tasks', 'stations', 'engineers'));
    }
    /**
     * Delete a task with the given ID. If the task belongs to a different
     * department, update the task's department ID to the previous department
     * ID instead of deleting it. Otherwise, delete the task. If the task is not
     * found, redirect back with an error message.
     *
     * @param  int  $id The ID of the task to delete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $task = MainTask::findOrFail($id);
        $departmentTask = department_task_assignment::where('main_tasks_id', $id)
            ->where('department_id', Auth::user()->department_id)
            ->first();
        if ($task) {
            if ($task->department_id === Auth::user()->department_id) {
                $task->delete();
                return redirect()->back()->with('success', 'تم الحذف بنجاح');
            } else {
                $departmentTask->delete();
                return redirect()->back()->with('success', 'تم حذف المهمة من القسم بنجاح');
            }
        }

        return redirect()->back()->with('error', 'لم يتم العثور على السجل.');
    }

    public function destroySectionTasks($id)
    {
        $task = SectionTask::findOrFail($id);
        $mainTask =  $task->main_task;
        $mainTask->update([
            'status' => 'pending'
        ]);
        if ($task) {
            $task->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('error', 'Record not found.');
    }
    public function timeline($id)
    {
        $main_task = MainTask::findOrFail($id);
        $departmentTask = department_task_assignment::where('main_tasks_id', $id)->orderBy('id', 'DESC')->get();
        $tasksTracking = TaskTimeline::where('main_tasks_id', $id)->orderBy('id', 'DESC')->get();
        return view('dashboard.timeline', compact('main_task', 'tasksTracking'));
    }
    public function convertTask(Request $request, $id)
    {
        $main_task = MainTask::findOrFail($id);
        $selectedDepartment = $request->input('departmentSelect');
        $note = $request->input('notes');
        $main_task->update([
            'isCompleted' => "0",
            'status' => 'pending',
            'notes' => $note
        ]);
        $departmentTask = department_task_assignment::where('main_tasks_id')
            ->where('department_id', $selectedDepartment)
            ->first();
        if ($departmentTask) {
            $departmentTask->update([
                'status' => 'pending'
            ]);
        } else {
            $converted_task = TaskConversions::create([
                'main_tasks_id' => $id,
                'source_department' => Auth::user()->department_id,
                'destination_department' => $selectedDepartment,
                'status' => 'pending'
            ]);
        }
        return back();
    }
    public function deleteConvertedTask(Request $request, $id)
    {
        $tasks = TaskConversions::findOrFail($id);
        $tasks->delete();
        return redirect()->back()->with('success', 'Task deleted successfully');
    }
    public function cancelConvertedTask(Request $request, $id)
    {
        $tasks = TaskConversions::findOrFail($id);
        $tasks->update([
            'tracked' => 0
        ]);
        return redirect()->back()->with('success', 'Task deleted successfully');
    }
    public function contactPage()
    {
        return view('dashboard.email-page');
    }
    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $user = User::where('email', 'azaalharbi@mew.gov.kw')->first();
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];
        $userEmail = Auth::user()->email;
        $username = Auth::user()->name;

        // $user->notify(new ContactFormNotification($email, $subject, $message));
        Notification::send($user, new ContactFormNotification($email, $subject, $message, $userEmail, $username));

        return redirect()->route('contactPage')->with('success', 'Message sent successfully!');
    }
}
