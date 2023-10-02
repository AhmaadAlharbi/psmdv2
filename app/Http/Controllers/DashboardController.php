<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Station;
use App\Models\Engineer;
use App\Models\MainTask;
use App\Models\MainAlarm;
use App\Models\Department;
use App\Models\SectionTask;
use App\Models\TaskTimeline;
use Illuminate\Http\Request;
use App\Models\TaskAttachment;
use App\Models\TaskConversions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\department_task_assignment;

class DashBoardController extends Controller
{

    public function index()
    {
        $departmentId = Auth::user()->department_id;
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
        })->where('isCompleted', "0")->latest()->get();


        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->where('approved', 1)->latest()->get();

        // Get the number of main tasks that were previously in the user's department and are now in another department
        $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)->Orwhere('source_department', $departmentId)->count();
        $incomingTasks = TaskConversions::whereHas('mainTask', function ($query) {
            $query->where('status', 'pending');
        })->where('destination_department', $departmentId)
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

        return view('dashboard.index', compact('pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
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
        //get tasks count for day , week and month
        // Get tasks count for a specific day
        // Get total tasks count for a specific day
        $totalTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereDate('created_at', now()->toDateString())->count();
        // Get completed tasks count for a specific day
        $completedTasksInDay = department_task_assignment::where('department_id', $departmentId)
            ->whereDate('created_at', now()->toDateString())
            ->where('isCompleted', 1)
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
            ])->where('isCompleted', 1)
            ->count();


        // Get total tasks count for the current month
        $totalTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)->count();

        // Get completed tasks count for the current month
        $completedTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)
            ->where('isCompleted', 1)
            ->count();
        $totalTasksAllTime = department_task_assignment::where('department_id', $departmentId)->count();
        $completedTasksAllTime = department_task_assignment::where('department_id', $departmentId)
            ->where('isCompleted', 1)->count();
        // Get the number of engineers in the user's department
        $engineersCount = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('department_id', Auth::user()->department_id);
        })
            ->count();
        // Get the number of section tasks in the user's department
        $sectionTasksCount = department_task_assignment::where('department_id', $departmentId)->count();
        $pendingTasksCount = department_task_assignment::where('department_id', $departmentId)->where('isCompleted', 0)->count();
        // Get the latest pending main tasks in the user's department, including those that were previously in the user's department
        $pendingTasks = department_task_assignment::where('department_id', Auth::user()->department_id)
            ->where('status', 'pending')
            ->with('main_task') // Eager load the main_task relationship
            ->whereHas('main_task.station', function ($query) use ($controlName) {
                $query->where('control', $controlName);
            })
            ->get();

        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->where('approved', 1)->latest()->get();

        // Get the number of main tasks that were previously in the user's department and are now in another department
        $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)->Orwhere('source_department', $departmentId)->count();
        $incomingTasks = TaskConversions::whereHas('mainTask', function ($query) {
            $query->where('status', 'pending');
        })->where('destination_department', $departmentId)
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

        return view('dashboard.index', compact('pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
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

        if ($tasks->eng_id !== Auth::user()->id) {
            return view('dashboard.unauthorized');
        }
        return view('dashboard.engineerTaskPage2', compact('tasks', 'files'));
    }
    public function submitEngineerReport(Request $request, $id)
    {
        $status_raidoBtn =  $request->input('action_take_status');

        // Retrieve the content from the 'action_take' input field
        $userText = $request->input('action_take');

        // Check if the user's content contains a style attribute for font size
        if (!preg_match('/style="font-size:\s*\d+px;"/', $userText)) {
            // If there's no font-size style, add the default font size
            $defaultFontSize = 'font-size:20px;';
            $actionTake = '<div><span style="' . $defaultFontSize . '">' . $userText . '</span><br></div>';
        }
        $date =  Carbon::now();
        $main_task = MainTask::findOrFail($id);
        $section_task = SectionTask::where('main_tasks_id', $id)->first();
        $taskConverted = TaskConversions::where('main_tasks_id', $id)
            ->where('source_department', Auth::user()->department_id)
            ->OrWhere('destination_department', Auth::user()->department_id)
            ->where('main_tasks_id', $id)
            ->first();
        $departmentTask = department_task_assignment::where('department_id', Auth::user()->department_id)
            ->where('main_tasks_id', $id)
            ->first();
        if ($taskConverted) {
            $taskSoruce = department_task_assignment::where('department_id', $taskConverted->source_department)
                ->where('main_tasks_id', $id) //PSMD
                ->first();
            $taskDestination = department_task_assignment::where('department_id', $taskConverted->destination_department)
                ->where('main_tasks_id', $id) //Proteciton first time
                ->first();
            //check if Edara sent this tasks 
            if ($taskConverted->source_department !== $departmentTask->department_id) {
                $taskSoruce->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "1"
                ]);
                $taskConverted->update([
                    'status' => 'completed',
                ]);
                SectionTask::create([
                    'main_tasks_id' => $id,
                    'department_id' => 1,
                    'eng_id' => Auth::user()->id,
                    'action_take' => $actionTake,
                    'main_alarm_id' => $main_task->main_alarm_id,
                    'status' => $status_raidoBtn,
                    'engineer-notes' => $request->notes,
                    'user_id' => Auth::user()->id,
                    'date' => $date,
                    'isCompleted' => "1",
                ]);
            }
            if ($taskConverted->source_department === Auth::user()->department_id) {
                $taskSoruce->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "1"
                ]);
                $taskConverted->update([
                    'status' => 'completed'
                ]);
            }
            if ($taskConverted->destination_department === Auth::user()->department_id) {
                $taskDestination->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "1"

                ]);
            }
            if ($taskDestination->status === 'completed' && $taskSoruce->status === 'completed') {
                $main_task->update([
                    'status' => $status_raidoBtn,
                    "isCompleted" => "1"
                ]);
            }
            SectionTask::create([
                'main_tasks_id' => $id,
                'department_id' => Auth::user()->department_id,
                'eng_id' => Auth::user()->id,
                'action_take' => $actionTake,
                'main_alarm_id' => $main_task->main_alarm_id,
                'status' => $status_raidoBtn,
                'engineer-notes' => $request->notes,
                'user_id' => Auth::user()->id,
                'date' => $date,
                'isCompleted' => "1"
            ]);
            TaskTimeline::create([
                'main_tasks_id' => $id,
                'department_id' => Auth::user()->department_id,
                'status' => 'Adding Report',
                'action' => "The Report has been added",
                'user_id' => Auth::user()->id
            ]);
            $departmentTask->update([
                'status' => 'completed',
            ]);
        } else {
            if (
                $status_raidoBtn == 'completed' || $status_raidoBtn == 'Responsibility of another entity'
                || $status_raidoBtn == 'Under warranty'
            ) {
                SectionTask::create([
                    'main_tasks_id' => $id,
                    'department_id' => Auth::user()->department_id,
                    'eng_id' => Auth::user()->id,
                    'action_take' => $request->action_take,
                    'main_alarm_id' => $main_task->main_alarm_id,
                    'status' =>  $status_raidoBtn,
                    'engineer-notes' => $request->notes ? $request->notes : $status_raidoBtn,
                    'user_id' => Auth::user()->id,
                    'date' => $date,
                    'isCompleted' => "1",
                    'approved' => 1,
                ]);
                TaskTimeline::create([
                    'main_tasks_id' => $id,
                    'department_id' => Auth::user()->department_id,
                    'status' => 'Adding Report',
                    'action' => "The Report has been added",
                    'user_id' => Auth::user()->id
                ]);
                $main_task->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "1"
                ]);
                $departmentTask->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "1"
                ]);
                TaskTimeline::create([
                    'main_tasks_id' => $id,
                    'department_id' => Auth::user()->department_id,
                    'status' => $status_raidoBtn,
                    'action' => "The status has been updated",
                    'user_id' => Auth::user()->id
                ]);
            } else {
                SectionTask::create([
                    'main_tasks_id' => $id,
                    'department_id' => Auth::user()->department_id,
                    'eng_id' => Auth::user()->id,
                    'action_take' => $request->action_take,
                    'main_alarm_id' => $main_task->main_alarm_id,
                    'status' => $status_raidoBtn,
                    'engineer-notes' => $request->notes ? $request->notes : $status_raidoBtn,
                    'user_id' => Auth::user()->id,
                    'date' => $date,
                    'isCompleted' => "0",
                    'approved' => 1,
                ]);
                TaskTimeline::create([
                    'main_tasks_id' => $id,
                    'department_id' => Auth::user()->department_id,
                    'status' => $status_raidoBtn,
                    'action' => "The status has been updated",
                    'user_id' => Auth::user()->id
                ]);
                $main_task->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "0"
                ]);
                $departmentTask->update([
                    'status' => $status_raidoBtn,
                    'isCompleted' => "0"
                ]);
            }
        }
        if ($request->hasfile('pic')) {
            foreach ($request->file('pic') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path('app/public/attachments/' . $main_task->id), $name); // Store in the 'storage' directory
                $data[] = $name;
                $refNum = $request->refNum;

                $attachments = new TaskAttachment();
                $attachments->main_tasks_id = $main_task->id;
                $attachments->department_id = Auth::user()->department_id;
                $attachments->file = $name;
                $attachments->user_id = Auth::user()->id;
                $attachments->save();
            }
        }

        return redirect("/dashboard/user");
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
            ->where('department_id', "!=", $department_id)
            ->count();
        $sections_tasks = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->where('department_id', "!=", $department_id)
            ->get();
        $files_count = TaskAttachment::where('main_tasks_id', $main_task_id)->where('department_id', $department_id)->count();
        $files = TaskAttachment::where('main_tasks_id', $main_task_id)->where('department_id', $department_id)->get();
        return view('dashboard.reportPage2', compact('section_task', 'sections_tasks', 'shared_reports_count', 'files', 'files_count'));
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
        $sharedTask = TaskConversions::where('main_tasks_id', $report->main_tasks_id)
            ->first();
        if (Auth::user()->department_id === $report->department_id) {
            $report->update([
                'approved' => !$approve_value
            ]);
            if ($sharedTask) {
                $sharedTaskReport =  SectionTask::where('department_id', $sharedTask->source_department)
                    ->where('main_tasks_id', $report->main_tasks_id)
                    ->where('isCompleted', "1")
                    ->first();
                $sharedTaskReport->update([
                    'approved' => !$approve_value
                ]);
            }
            return back();
        }
    }
    public function showTasks($status)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $currentMonth = Carbon::now()->month;
        $isAdmin = Auth()->user()->role->title == 'Admin';
        $tasks = $isAdmin ? $this->getAdminTasks($status, $currentMonth) : $this->getEngineerTasks($status);
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
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers', 'status', 'reports'));
    }
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
                    ->where('status', 'completed')
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
}
