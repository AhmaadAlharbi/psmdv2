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
use App\Notifications\TaskReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use App\Models\department_task_assignment;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactFormNotification;

class DashBoardController extends Controller
{

    public function index()
    {
        $department_id = Auth::user()->department_id;
        // return $tasks =  MainTask::with(['sharedDepartments'])
        //     ->whereHas('sharedDepartments', function ($query) use ($department_id) {
        //         $query->where('department_id', $department_id);
        //     })
        //     ->with('section_tasks')
        //     ->get();
        $departmentId = Auth::user()->department_id;
        $mainTasks = MainTask::whereHas('departmentsAssienments', function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->get();
        $engineerNames = [];
        $engineerData = [];
        foreach ($mainTasks as $task) {
            foreach ($task->departmentsAssienments as $assignment) {
                if ($assignment->eng_id && $assignment->department_id == $departmentId) {

                    if ($assignment->eng_id) {
                        $engineerName = $assignment->engineer->name;

                        // If the engineerName is not yet in the array, initialize the counts
                        if (!isset($engineerData[$engineerName])) {
                            $engineerData[$engineerName] = [
                                'name' => $engineerName,
                                'assigned_tasks' => 0,
                                'completed_tasks' => 0,
                                'pending_tasks' => 0,
                                'completion_percentage' => 0, // Initialize completion percentage
                            ];
                        }

                        // Increment counts based on the task status
                        $engineerData[$engineerName]['assigned_tasks']++;
                        $engineerData[$engineerName]['completed_tasks'] += $assignment->isCompleted ? 1 : 0;
                        $engineerData[$engineerName]['pending_tasks'] += $assignment->isCompleted ? 0 : 1;

                        // Calculate completion percentage
                        $completedTasks = $engineerData[$engineerName]['completed_tasks'];
                        $assignedTasks = $engineerData[$engineerName]['assigned_tasks'];
                        $completionPercentage = ($assignedTasks > 0) ? ($completedTasks / $assignedTasks) * 100 : 0;

                        // Update completion percentage in the data array
                        $engineerData[$engineerName]['completion_percentage'] = round($completionPercentage, 2);
                    }
                }
            }
        }


        // Order the engineerData array by assigned_tasks in descending order
        // Sort the $engineerData array by assigned_tasks in descending order
        usort($engineerData, function ($a, $b) {
            return $b['completed_tasks'] - $a['completed_tasks'];
        });



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
            ->whereNotNull('eng_id')
            ->where('isCompleted', "0")->latest()->get();

        $unAssignedTasks =  department_task_assignment::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })
            ->whereNull('eng_id')
            ->where('isCompleted', "0")
            ->latest()
            ->get();

        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('isCompleted', '1')->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department

        if (Auth::user()->department_id == 1) {
            $mainTasksWithDepartments = MainTask::with('departmentsAssienments', 'sharedDepartments', 'section_tasks')
                ->whereHas('departmentsAssienments', function ($query) {
                    $query->where('department_id', 1);
                })
                ->get();
            $completedTasks = collect();

            foreach ($mainTasksWithDepartments as $mainTask) {
                // Get the related SectionTasks for each MainTask
                $sectionTasks = $mainTask->section_tasks
                    ->where('isCompleted', 1)
                    ->where('approved', 1);

                // Add the SectionTasks to the $completedTasks collection
                $completedTasks = $completedTasks->merge($sectionTasks);
            }
        } else {
            $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })->where('isCompleted', '1')->where('approved', 1)->latest()->get();
        }




        // Get the number of main tasks that were previously in the user's department and are now in another department
        // $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)
        //     ->Orwhere('source_department', $departmentId)->count();
        $mutualTasksCount = MainTask::with(['sharedDepartments'])
            ->where('isCompleted', "0")
            ->whereHas('sharedDepartments', function ($query) use ($departmentId) {
                $query->where('department_id', Auth::user()->department_id);
            })
            ->count();

        // return $mainTasks;

        //    return $mutualTasksCount = $mainTask->sharedDepartments;    
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

        return view('dashboard.index', compact('engineerData', 'unAssignedTasks', 'departments', 'usersPendingCount', 'stationsCount', 'pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
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

        $departmentId = Auth::user()->department_id;
        $mainTasks = MainTask::whereHas('departmentsAssienments', function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->get();
        $engineerNames = [];
        $engineerNames = [];
        $engineerData = [];
        foreach ($mainTasks as $task) {
            foreach ($task->departmentsAssienments as $assignment) {
                if ($assignment->eng_id && $assignment->department_id == $departmentId) {

                    if ($assignment->eng_id) {
                        $engineerName = $assignment->engineer->name;

                        // If the engineerName is not yet in the array, initialize the counts
                        if (!isset($engineerData[$engineerName])) {
                            $engineerData[$engineerName] = [
                                'name' => $engineerName,
                                'assigned_tasks' => 0,
                                'completed_tasks' => 0,
                                'pending_tasks' => 0,
                                'completion_percentage' => 0, // Initialize completion percentage
                            ];
                        }

                        // Increment counts based on the task status
                        $engineerData[$engineerName]['assigned_tasks']++;
                        $engineerData[$engineerName]['completed_tasks'] += $assignment->isCompleted ? 1 : 0;
                        $engineerData[$engineerName]['pending_tasks'] += $assignment->isCompleted ? 0 : 1;

                        // Calculate completion percentage
                        $completedTasks = $engineerData[$engineerName]['completed_tasks'];
                        $assignedTasks = $engineerData[$engineerName]['assigned_tasks'];
                        $completionPercentage = ($assignedTasks > 0) ? ($completedTasks / $assignedTasks) * 100 : 0;

                        // Update completion percentage in the data array
                        $engineerData[$engineerName]['completion_percentage'] = round($completionPercentage, 2);
                    }
                }
            }
        }
        // Order the engineerData array by assigned_tasks in descending order
        // Sort the $engineerData array by assigned_tasks in descending order
        usort($engineerData, function ($a, $b) {
            return $b['completed_tasks'] - $a['completed_tasks'];
        });

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
        $unAssignedTasks =  department_task_assignment::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })
            ->whereNull('eng_id')
            ->where('isCompleted', "0")
            ->latest()
            ->get();
        return view('dashboard.index', compact('engineerData', 'unAssignedTasks', 'departments', 'usersPendingCount', 'stationsCount', 'pendingReportsCount', 'outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
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
        $tasks = department_task_assignment::where('main_tasks_id', $id)
            ->where('department_id', Auth::user()->department_id)
            ->first();
        $mainTask = MainTask::findOrFail($id);
        $task_shared = $mainTask->sharedDepartments ?? collect();

        // Exclude the current user's department from the shared departments

        $reportShared = SectionTask::where('main_tasks_id', $id)
            ->whereIn('department_id', $task_shared->where('id', '!=', Auth::user()->department_id)->pluck('id')->toArray())
            ->where('approved', 1)
            ->get();
        // return $task_shared;
        $files = TaskAttachment::where('main_tasks_id', $id)->get();

        if (!$tasks) {
            // Flash message and then redirect to the home page
            return redirect()->route('dashboard.userIndex')->with('warning', 'This task may have been deleted.');
        }

        $tasks->update([
            'isSeen' => 1
        ]);

        if ($tasks->eng_id != Auth::user()->id) {
            return view('dashboard.unauthorized');
        }

        return view('dashboard.engineerTaskPage2', compact('tasks', 'files', 'reportShared'));
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
            $validated = $request->validate([
                'action_take' => [
                    'bail',
                    'required',
                    'string',
                    function ($attribute, $value, $fail) {
                        // Check if the value is equal to "User"
                        if (strtolower($value) === '<div><br></div>') {
                            // If yes, apply additional validation rules
                            $fail("Custom validation failed for $attribute.");
                        }
                    },
                ],
            ]);





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
            session()->flash('success', 'Your report has been saved successfully.');

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
        // Retrieve all department_task_assignment records related to the specified $mainTask
        $sharedDepartmentTask = department_task_assignment::where('main_tasks_id', $mainTask->id)
            ->get()
            // Filter the collection to include only records with department_id equal to current user
            ->filter(function ($task) {
                return $task->department_id == Auth::user()->department_id;
            })
            // Retrieve the first matching record from the filtered collection
            ->first();
        $departmentTasks = $mainTask->departmentsAssienments()->get();
        foreach ($departmentTasks as $task) {
            if ($task->department_id == Auth::user()->department_id) {
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
                    'isCompleted' => $isCompleted
                ]);
            }
            if ($task->department_id == 1) {
                SectionTask::create([
                    'main_tasks_id' => $mainTask->id,
                    'department_id' => 1,
                    'eng_id' => Auth::user()->id,
                    'action_take' => $actionContent,
                    'main_alarm_id' => $mainTask->main_alarm_id,
                    'status' => $actionStatus,
                    'engineer-notes' => $request->notes,
                    'user_id' => Auth::user()->id,
                    'date' => now(),
                    'isCompleted' => $isCompleted
                ]);
            }
        }


        // SectionTask::create([
        //     'main_tasks_id' => $mainTask->id,
        //     'department_id' => Auth::user()->department_id,
        //     'eng_id' => Auth::user()->id,
        //     'action_take' => $actionContent,
        //     'main_alarm_id' => $mainTask->main_alarm_id,
        //     'status' => $actionStatus,
        //     'engineer-notes' => $request->notes,
        //     'user_id' => Auth::user()->id,
        //     'date' => now(),
        //     'isCompleted' =>  $isCompleted
        // ]);

        // Step 3: Create a SectionTask for the current department

        // Step 4: Create a TaskTimeline entry for adding the report
        TaskTimeline::create([
            'main_tasks_id' => $mainTask->id,
            'department_id' => Auth::user()->department_id,
            'status' => 'Adding Report',
            'action' => "The Report has been added",
            'user_id' => Auth::user()->id
        ]);
        // Step 5: Update the department task status to 'completed'
        $sharedDepartmentTask->update([
            'status' => 'completed',
            'isCompleted' => "1"
        ]);
        // Continue with other relevant tasks and updates
        // if ($isCompleted) {
        //     $this->logTaskCompletion($departmentTask, $actionStatus);
        // }
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
        if ($isCompleted) {
            TaskTimeline::create([
                'main_tasks_id' => $mainTask->id,
                'department_id' => Auth::user()->department_id,
                'status' => 'Report Added',
                'action' => 'The Report has been added',
                'user_id' => Auth::user()->id,
            ]);
        }


        // Prepare updates for the main task and department task
        $mainTaskUpdates = [
            'status' => $actionStatus,
            'isCompleted' => $isCompleted,
        ];

        $departmentTaskUpdates = [
            'status' => $actionStatus,
            'isCompleted' => $isCompleted,
        ];
        // if ($mainTask->main_alarm->id == 1) {
        //     $this->logTaskCompletion($departmentTask, $actionStatus);
        // }
        // Create a task log entry to track the completion time


        // Update the main task and department task with the prepared updates
        $this->updateTaskAndDepartmentTask($mainTask, $departmentTask, $mainTaskUpdates, $departmentTaskUpdates, $actionContent);
    }

    /**
     * Update a main task and its related department task with the specified updates.
     *
     * @param MainTask $mainTask The main task to update
     * @param DepartmentTask $departmentTask The related department task to update
     * @param array $mainTaskUpdates The updates for the main task
     * @param array $departmentTaskUpdates The updates for the department task
     */
    private function updateTaskAndDepartmentTask($mainTask, $departmentTask, $mainTaskUpdates, $departmentTaskUpdates, $actionContent)
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
            'engineer_note' => $actionContent,

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
    // private function logTaskCompletion($mainTask, $actionStatus)
    // {


    //     $user = Auth::user();
    //     $assignedTime = Carbon::parse($mainTask->created_at);
    //     $completedTime = now();
    //     $timeTakenInMinutes = $assignedTime->diffInMinutes($completedTime);
    //     $taskType = $mainTask->is_emergency;
    //     if ($taskType === TaskLog::TASK_TYPE_NORMAL) {
    //         // Normal task
    //         if ($actionStatus !== 'First Draft') {
    //             // Check if it's late based on the time taken
    //             $isLate = $timeTakenInMinutes > (24 * 60);
    //         }
    //     } elseif ($taskType === TaskLog::TASK_TYPE_EMERGENCY) {
    //         // Emergency task
    //         if ($actionStatus !== 'First Draft') {
    //             // Check if it's late based on the time taken
    //             $isLate = $timeTakenInMinutes > (2 * 60);
    //         }
    //     }
    //     // Check if it's a normal task and if it's late

    //     TaskLog::create([
    //         'task_id' => $mainTask->id,
    //         'user_id' => $user->id,
    //         'task_type' => TaskLog::TASK_TYPE_NORMAL,
    //         'assigned_time' => $assignedTime,
    //         'completed_time' => $completedTime,
    //         'time_taken' => $timeTakenInMinutes,
    //         'is_late' => $isLate,

    //     ]);
    // }
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
    public function getAllReportsForAtask($id)
    {
        $department_id = Auth::user()->department_id;
        $shared_reports_count = SectionTask::where('main_tasks_id', $id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->count();
        $sections_tasks = SectionTask::where('main_tasks_id', $id)
            ->where('isCompleted', "1")
            ->where('approved', true)
            ->get();
        $files_count = TaskAttachment::where('main_tasks_id', $id)->where('department_id', $department_id)->count();
        $files = TaskAttachment::where('main_tasks_id', $id)->where('department_id', $department_id)->get();
        $departments = Department::all();
        $taskConverted = TaskConversions::where('main_tasks_id', $id)
            ->where(function ($query) use ($department_id) {
                $query->where('source_department', $department_id)
                    ->orWhere('destination_department', $department_id);
            })
            ->first();

        if ($taskConverted) {
            $section_task = SectionTask::where('main_tasks_id', $id)->where('isCompleted', "1")->first();
            return view('dashboard.reportPage2', compact('departments', 'section_task', 'sections_tasks', 'shared_reports_count', 'files', 'files_count'));
        }
    }
    public function pendingReports()
    {
        // Retrieve section tasks for the user's department that are not approved
        $sectionTasks = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('approved', false)
            ->with('main_task')
            ->get();

        // Get unique main task IDs from section tasks
        $mainTaskIds = $sectionTasks->pluck('main_tasks_id')->unique();

        // Retrieve department task assignments for the user's department and the selected main tasks
        $tasks = department_task_assignment::where('department_id', Auth::user()->department_id)
            ->whereIn('main_tasks_id', $mainTaskIds)
            ->with(['main_task' => function ($query) {
                // Eager load the main_task and its section_tasks
                $query->with(['section_tasks' => function ($query) {
                    // Filter section_tasks where department_id matches the user's department
                    $query->where('department_id', Auth::user()->department_id);
                }]);
            }])
            ->paginate(6);

        // Retrieve all stations
        $stations = Station::all();

        // Retrieve engineers for the user's department
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();

        // Additional logic for retrieving or processing reports (not provided in the original code)

        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }

    public function requestToUpdateReport($id)
    {
        // $section_task = SectionTask::where('main_tasks_id', $main_task_id)
        //     ->where('department_id', Auth::user()->department_id)
        //     ->where('isCompleted', "1")
        //     ->first();
        $section_task = SectionTask::findOrFail($id);
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
        session()->flash('success', 'Your report has been updated successfully.');

        return redirect("/dashboard/user");
    }
    public function approveReports($id)
    {
        // Retrieve the report being approved
        $report = SectionTask::findOrFail($id);

        // Get the current approval status of the report
        $approve_value = $report->approved;

        // Retrieve the main task associated with the report
        $mainTask = MainTask::where('id', $report->main_tasks_id)->first();

        // Verify that the user's department matches the department of the report
        if (Auth::user()->department_id === $report->department_id) {
            // Toggle the approval status of the report
            $report->update([
                'approved' => !$approve_value
            ]);

            // Retrieve all department tasks associated with the main task
            $departmentTasks = department_task_assignment::where('main_tasks_id', $mainTask->id)->get();
            // Check if all department tasks are completed
            $allTasksCompleted = true;
            $isApprove = $report->approved ? 1 : 0;
            foreach ($departmentTasks as $task) {
                if ($task->department_id == 1) {
                    $task->update(['isCompleted' => "1"]);
                }
                if (!$task->isCompleted) {
                    $allTasksCompleted = false;
                    break; // If any task is not completed, exit the loop
                }
            }
            // Update the main task's completion status based on department tasks and approval status
            $mainTask->update([
                'isCompleted' => $allTasksCompleted && $isApprove ? "1" : "0",
                'updated_at' => now(),
                'notified' => true,
                'updated_by_department_id' => Auth::user()->department_id
            ]);
            // Redirect with success message based on approval status
            if ($report->approved) {
                return back()->with('success', 'Approval successful!');
            } else {
                return back()->with('success', 'The report was not approved.');
            }
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
        // $tasks = MainTask::where('id', $id)->paginate(6);
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
                // $tasks = TaskConversions::where('source_department', Auth::user()->department_id)
                //     ->orWhere('destination_department', Auth::user()->department_id)
                //     ->latest()
                //     ->paginate(6);
                $tasks = department_task_assignment::where('department_id', '!=', Auth::user()->department_id)
                    ->whereHas('main_task.sharedDepartments', function ($query) {
                        $query->where('departments.id', Auth::user()->department_id);
                    })
                    ->whereHas('main_task', function ($query) {
                        $query->where('isCompleted', '0');
                    })
                    ->with('main_task') // Eager load the related MainTask records
                    ->latest()
                    ->paginate(6);

                // Update the is_notified column for each task
                // $tasks->each(function ($task) {
                //     $task->update(['is_notified' => true]);
                // });

                return $tasks;
            case 'all-mutual-tasks':
                // $tasks = TaskConversions::where('source_department', Auth::user()->department_id)
                //     ->orWhere('destination_department', Auth::user()->department_id)
                //     ->latest()
                //     ->paginate(6);
                $tasks = department_task_assignment::where('department_id', '=', Auth::user()->department_id)
                    ->whereHas('main_task.sharedDepartments', function ($query) {
                        $query->where('departments.id', Auth::user()->department_id);
                    })
                    ->with('main_task') // Eager load the related MainTask records
                    ->latest()
                    ->paginate(6);

                // Update the is_notified column for each task
                // $tasks->each(function ($task) {
                //     $task->update(['is_notified' => true]);
                // });

                return $tasks;

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

        // Check if a station is selected in the search form
        if ($request->has('station')) {
            // Store the selected station's name in the session
            session()->put('selected_station', $request->station);
        }

        // Retrieve the selected station's name from the session
        $selectedStationName = session()->get('selected_station');

        // Find the corresponding station based on the stored name
        $station = $selectedStationName
            ? Station::where('SSNAME', $selectedStationName)->first()
            : null;

        // If the station is not found, you might want to handle this case appropriately

        $tasksQuery = department_task_assignment::join('main_tasks', 'department_task_assignment.main_tasks_id', '=', 'main_tasks.id')
            ->where('department_task_assignment.department_id', Auth::user()->department_id);

        // If a station is selected, filter tasks by station
        if ($station) {
            $tasksQuery->where('main_tasks.station_id', $station->id);
        }

        $tasks = $tasksQuery->latest('department_task_assignment.created_at')->paginate(6);

        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }

    public function engineerTasks(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();

        // Check if an engineer is selected in the search form
        if ($request->has('engineer')) {
            // Store the selected engineer's name in the session
            session()->put('selected_engineer', $request->engineer);
        }

        // Retrieve the selected engineer's name from the session
        $selectedEngineerName = session()->get('selected_engineer');

        // Find the corresponding user based on the stored name
        $engineer = $selectedEngineerName
            ? User::where('name', $selectedEngineerName)->first()
            : null;

        $tasksQuery = department_task_assignment::where('department_id', Auth::user()->department_id);

        // If an engineer is selected, filter tasks by engineer
        if ($engineer) {
            $tasksQuery->where('eng_id', $engineer->id);
        }

        $tasks = $tasksQuery->latest()->paginate(6);

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
        $tasks = SectionTask::where('department_id', Auth::user()->department_id)->where('isCompleted', "1")->latest()->paginate(6);
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
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
        try {
            $task = MainTask::findOrFail($id);
            $departmentTask = department_task_assignment::where('main_tasks_id', $id)
                ->where('department_id', Auth::user()->department_id)
                ->first();

            $user_department_id = $task->user->department_id;

            // Check if task sent from the department that the user belongs to
            if ($user_department_id == Auth::user()->department_id) {
                if ($departmentTask) {
                    $departmentTask->delete();
                }
                $task->forceDelete();
                return redirect()->back()->with('success', 'Deleted successfully.');
            } else {
                // If the task is not from the user's department, only delete the departmentTask
                if ($departmentTask) {
                    $departmentTask->delete();
                }
                return redirect()->back()->with('success', 'Deleted successfully');
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Record not found.');
        }
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
            return redirect()->back()->with('success', 'Successfully deleted');
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
        $mainTask = MainTask::findOrFail($id);
        $selectedDepartment = $request->input('departmentSelect');
        $note = $request->input('notes');
        // $department_source = $mainTask->departmentsAssienments;
        // $firstDepartment = $department_source->first();
        // $department_id = $firstDepartment ? $firstDepartment->department_id : null;

        // Update MainTask details
        $mainTask->update([
            'isCompleted' => "0",
            'status' => 'pending',
            'notes' => $note,
            'notified' => 1,
            'updated_by_department_id' => Auth::user()->department_id
        ]);

        // Check if the task is already assigned to the selected department
        $departmentTask = $mainTask->departmentsAssienments()
            ->where('department_id', Auth::user()->department_id)
            ->first();
        // Create a new department task and share the task with the destination department
        // $mainTask->departmentsAssienments()->create([
        //     'department_id' => $selectedDepartment,
        //     'status' => 'pending', 
        // ]);

        if ($departmentTask) {
            $mainTask->sharedDepartments()->attach($departmentTask->department_id);
        }
        $mainTask->sharedDepartments()->attach($selectedDepartment);

        // Record task conversion
        TaskConversions::create([
            'main_tasks_id' => $id,
            'source_department' => Auth::user()->department_id,
            'destination_department' => $selectedDepartment,
            'status' => 'pending',
        ]);


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
    // public function dailyReports()
    // {
    //     $todayDate = Carbon::today()->toDateString();
    //     $selectedDate = $todayDate;
    //     $townDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $todayDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'TOWN CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     $jahraDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $todayDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'JAHRA CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();
    //     $shuaibaDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $todayDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'SHUAIBA CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     $nationalDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $todayDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'NATIONAL CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     return view('dashboard.daily-reports', compact('selectedDate', 'townDccTasks', 'jahraDccTasks', 'shuaibaDccTasks', 'nationalDccTasks'));
    // }
    // public function dailyReportSearchTasks(Request $request)
    // {
    //     $selectedDate = $request->input('selectedDate');
    //     // Adjust the logic to fetch tasks based on the selected date
    //     // Parse the input date using Carbon
    //     $parsedDate = Carbon::createFromFormat('d/m/Y', $selectedDate)->toDateString();

    //     $townDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $parsedDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'TOWN CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     $jahraDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $parsedDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'JAHRA CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();
    //     $shuaibaDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $parsedDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'SHUAIBA CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     $nationalDccTasks = MainTask::where('isCompleted', '1')
    //         ->whereDate('created_at', $parsedDate)
    //         ->whereHas('station', function (Builder $query) {
    //             $query->where('control', 'NATIONAL CONTROL CENTER');
    //         })
    //         ->whereHas('departmentsAssienments', function (Builder $query) {
    //             $query->where('department_id', Auth::user()->department_id);
    //         })
    //         ->get();

    //     return view('dashboard.daily-reports', compact('selectedDate', 'townDccTasks', 'jahraDccTasks', 'shuaibaDccTasks', 'nationalDccTasks'));
    // }
    public function dailyReports()
    {
        // Get today's date
        $todayDate = now()->toDateString();
        $selectedDate = $todayDate;

        // Get tasks for each control center
        $townDccTasks = $this->getTasksForControlCenter('TOWN CONTROL CENTER', $todayDate);
        $jahraDccTasks = $this->getTasksForControlCenter('JAHRA CONTROL CENTER', $todayDate);
        $shuaibaDccTasks = $this->getTasksForControlCenter('SHUAIBA CONTROL CENTER', $todayDate);
        $nationalDccTasks = $this->getTasksForControlCenter('NATIONAL CONTROL CENTER', $todayDate);
        $jabriaDccTasks = $this->getTasksForControlCenter('JABRIYA CONTROL CENTER', $todayDate);
        return view('dashboard.daily-reports', compact('jabriaDccTasks', 'selectedDate', 'townDccTasks', 'jahraDccTasks', 'shuaibaDccTasks', 'nationalDccTasks'));
    }
    public function dailyReportSearchTasks(Request $request)
    {
        // Get the selected date from the request
        $selectedDate = $request->input('selectedDate');
        $parsedDate = Carbon::createFromFormat('d/m/Y', $selectedDate)->toDateString();
        // Get tasks for each control center based on the selected date
        $townDccTasks = $this->getTasksForControlCenter('TOWN CONTROL CENTER', $parsedDate);
        $jahraDccTasks = $this->getTasksForControlCenter('JAHRA CONTROL CENTER', $parsedDate);
        $shuaibaDccTasks = $this->getTasksForControlCenter('SHUAIBA CONTROL CENTER', $parsedDate);
        $nationalDccTasks = $this->getTasksForControlCenter('NATIONAL CONTROL CENTER', $parsedDate);
        $jabriaDccTasks = $this->getTasksForControlCenter('JABRIYA CONTROL CENTER', $parsedDate);

        return view('dashboard.daily-reports', compact('jabriaDccTasks', 'selectedDate', 'townDccTasks', 'jahraDccTasks', 'shuaibaDccTasks', 'nationalDccTasks'));
    }

    /**
     * Get tasks for a specific control center and date.
     *
     * @param  string  $controlCenter
     * @param  string  $date
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getTasksForControlCenter($controlCenter, $date)
    {
        return MainTask::where('isCompleted', '1')
            ->whereDate('created_at', $date)
            ->whereHas('station', function (Builder $query) use ($controlCenter) {
                $query->where('control', $controlCenter);
            })
            ->whereHas('departmentsAssienments', function (Builder $query) {
                $query->where('department_id', Auth::user()->department_id);
            })
            ->get();
    }
    public function tasksSentByUser($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Retrieve the department task assignments related to the user
        $mainTasks = department_task_assignment::whereHas('main_task', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->latest()->get();

        $departments = Department::all();
        // Pass the user and tasks to the view
        if ($user->id != Auth::user()->id) {
            return view('dashboard.unauthorized');
        }
        return view('dashboard.adminAssignedTasks', compact('user', 'mainTasks', 'departments'));
    }
    public function importOldReports()
    {
        $userDepartmentId = Auth::user()->department_id;
        $stations = Station::all();
        $main_alarms = MainAlarm::where('department_id', $userDepartmentId)->get();
        $query = Engineer::join('users', 'users.id', '=', 'engineers.user_id')
            ->where('engineers.department_id', $userDepartmentId);

        // Retrieve the engineers based on the conditions
        $engineers = $query->orderBy('users.name', 'asc')
            ->get();
        return view('dashboard.importReport', compact('stations', 'main_alarms', 'engineers'));
    }
    public function resendTask($taskId)
    {
        // Retrieve the task
        $task = MainTask::findOrFail($taskId);

        $engineerAssignment = $task->departmentsAssienments->first();

        if ($engineerAssignment) {
            $engineerId = $engineerAssignment->eng_id;
        } else {
            // Handle the case where no assignment is found
            return null;
        }
        // Retrieve attachments for the task
        $taskAttachments = TaskAttachment::where('main_tasks_id', $taskId)->get();
        // Send the notification to the engineer's email
        try {
            $user = User::where('id', $engineerId)->first();
            if ($user) {
                // Assuming your TaskReport notification class accepts attachments
                $user->notify(new TaskReport($task, $taskAttachments));
                session()->flash('success', 'Email has been sent successfully.');
            } else {
                session()->flash('error', 'Engineer not found. Please check the email address.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while re-sending the task.');
        }

        return redirect()->back();
    }
    // public function submitOldReport(Request $request)
    // {
    //     $main_task = MainTask::create([
    //         'refNum' => $refNum,
    //         'station_id' =>  $this->station_id,
    //         'voltage_level' => $this->selectedVoltage,
    //         'equip_number' =>  $equip_number . ' - ' . $equip_name,
    //         'date' => $this->date,
    //         'problem' => $this->problem,
    //         'work_type' => $this->work_type,
    //         'notes' => $this->notes,
    //         'status' => 'pending',
    //         'main_alarm_id' => $mainAlarmId,
    //         'user_id' => Auth::user()->id,
    //         'is_emergency' => $this->is_emergency
    //     ]);
    // }
}
