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
use Illuminate\Http\Request;
use App\Models\TaskAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\department_task_assignment;
use App\Models\TaskConversions;

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
            ->where('status', 'completed')

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
            ])->where('status', 'completed')
            ->count();


        // Get total tasks count for the current month
        $totalTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)->count();

        // Get completed tasks count for the current month
        $completedTasksInMonth = department_task_assignment::where('department_id', $departmentId)
            ->whereMonth('created_at', now()->month)
            ->where('status', 'completed')
            ->count();
        $totalTasksAllTime = department_task_assignment::where('department_id', $departmentId)->count();
        $completedTasksAllTime = department_task_assignment::where('department_id', $departmentId)
            ->where('status', 'completed')->count();
        // Get the number of engineers in the user's department
        $engineersCount = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('department_id', Auth::user()->department_id);
        })
            ->count();
        // Get the number of section tasks in the user's department
        $sectionTasksCount = department_task_assignment::where('department_id', $departmentId)->count();
        $pendingTasksCount = department_task_assignment::where('department_id', $departmentId)->where('status', 'pending')->count();
        // Get the latest pending main tasks in the user's department, including those that were previously in the user's department
        $pendingTasks = department_task_assignment::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('status', 'pending')->get();

        // Get the number of completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasksCount = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('status', 'completed')->count();

        // Get the latest completed section tasks in the user's department, including those that were previously in the user's department
        $completedTasks = SectionTask::where(function ($query) use ($departmentId) {
            $query->where('department_id', $departmentId);
        })->where('status', 'completed')->get();

        // Get the number of main tasks that were previously in the user's department and are now in another department
        $mutualTasksCount = TaskConversions::where('destination_department', $departmentId)->count();
        $incomingTasks = TaskConversions::whereHas('mainTask', function ($query) {
            $query->where('status', 'pending');
        })->where('destination_department', $departmentId)->get();
        $outgoingTasks = TaskConversions::whereHas('mainTask', function ($query) {
            $query->where('status', 'pending');
        })->where('source_department', $departmentId)->get();


        $currentWeekStart = now()->startOfWeek(Carbon::SUNDAY)->toDateString();
        $currentWeekEnd = now()->endOfWeek(Carbon::SUNDAY)->toDateString();

        $tasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as total_tasks_this_week')
            ->get();
        $completedTasksByEngineerThisWeek = SectionTask::whereBetween('date', [$currentWeekStart, $currentWeekEnd])
            ->where('status', 'completed')
            ->groupBy('eng_id')
            ->selectRaw('eng_id, COUNT(*) as completed_tasks_this_week')
            ->get();


        return view('dashboard.index', compact('outgoingTasks', 'incomingTasks', 'totalTasksAllTime', 'completedTasksAllTime', 'totalTasksInDay', 'completedTasksInDay', 'totalTasksInWeek', 'completedTasksInWeek', 'totalTasksInMonth', 'completedTasksInMonth', 'sectionTasksCount', 'pendingTasksCount', 'mutualTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
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

        // Count the number of engineers in the current user's department
        $engineersCount = Engineer::where('department_id', Auth::user()->department_id)->count();

        // Count the number of section tasks in the current user's department
        $sectionTasksCount = MainTask::where('department_id', Auth::user()->department_id)->count();

        // Count the number of pending tasks in the current user's department and control
        $pendingTasksCount = MainTask::where('department_id', Auth::user()->department_id)
            ->where('status', 'pending')
            ->whereHas('station', function ($query) use ($control) {
                $query->where('control', $control);
            })->count();

        // Get a list of pending tasks in the current user's department and control
        $pendingTasks = MainTask::where('department_id', Auth::user()->department_id)
            ->where('status', 'pending')
            ->whereHas('station', function ($query) use ($controlName) {
                $query->where('control', $controlName);
            })
            ->latest()
            ->paginate(4, ['*'], 'page2');

        // Count the number of completed tasks in the current user's department and control
        $completedTasksCount = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('status', 'completed')
            ->whereHas('main_task.station', function ($query) use ($controlName) {
                $query->where('control', $controlName);
            })->count();

        // Get a list of completed tasks in the current user's department and control
        $completedTasks = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('status', 'completed')
            ->whereHas('main_task.station', function ($query) use ($controlName) {
                $query->where('control', $controlName);
            })
            ->latest()
            ->paginate(2, ['*'], 'page2');

        // Count the number of mutual tasks (i.e. tasks that were transferred from another department)
        $mutualTasks = TaskConversions::where('source_department', Auth::user()->department_id)->orWhere('destination_department', Auth::user()->department_id)->count();

        return view('dashboard.index', compact('sectionTasksCount', 'mutualTasks', 'pendingTasksCount', 'pendingTasks', 'completedTasks', 'engineersCount', 'completedTasksCount'));
    }
    public function userIndex()
    {
        $pendingTasksCount = department_task_assignment::where('eng_id', Auth::user()->id)->where('status', 'pending')->count();
        $pendingTasks = department_task_assignment::where('eng_id', Auth::user()->id)->where('department_id', Auth::user()->department_id)->where('status', 'pending')->latest()->paginate(7, ['*'], 'page2');
        $completedTasksCount = SectionTask::where('eng_id', Auth::user()->id)->where('status', 'completed')->where('department_id', Auth::user()->department_id)->count();
        $completedTasks = SectionTask::where('department_id', Auth::user()->department_id)->where('status', 'completed')->latest()->paginate(7, ['*'], 'page2');
        $archiveCount = SectionTask::where('department_id', Auth::user()->department_id)->where('status', 'completed')->count();
        return view('dashboard.engineers.index', compact('pendingTasksCount', 'pendingTasks', 'completedTasksCount', 'completedTasks', 'archiveCount'));
    }
    public function add_task()
    {
        return view('dashboard.add_task');
    }
    public function engineerTaskPage($id)
    {
        $tasks = department_task_assignment::where('main_tasks_id', $id)->first();
        $files = TaskAttachment::where('main_tasks_id', $id)->get();
        if (!$tasks) {
            abort(404);
        }
        if ($tasks->eng_id !== Auth::user()->id) {
            return view('dashboard.unauthorized');
        }
        return view('dashboard.engineerTaskPage', compact('tasks', 'files'));
    }
    public function submitEngineerReport(Request $request, $id)
    {
        $date =  Carbon::now();
        $main_task = MainTask::findOrFail($id);
        $section_task = SectionTask::where('main_tasks_id', $id)->first();
        $taskConverted = TaskConversions::where('main_tasks_id', $id)->first();
        if ($taskConverted) {
            $taskConverted->update([
                'status' => 'completed'
            ]);
            $taskSoruce = department_task_assignment::where('department_id', $taskConverted->source_department)
                ->where('main_tasks_id', $id)
                ->first();
            $taskDestination = department_task_assignment::where('department_id', $taskConverted->destination_department)
                ->where('main_tasks_id', $id)
                ->first();
            //check if Edara sent this tasks 
            if ($taskConverted->source_department === 1) {
                $taskSoruce->update([
                    'status' => 'completed',
                ]);
            }
            if ($taskConverted->source_department === Auth::user()->department_id) {
                $taskSoruce->update([
                    'status' => 'completed',
                ]);
            }
            if ($taskConverted->destination_department === Auth::user()->department_id) {
                $taskDestination->update([
                    'status' => 'completed'
                ]);
            }
            if ($taskDestination->status === 'completed' && $taskSoruce->status === 'completed') {
                $main_task->update([
                    'status' => 'completed',
                ]);
            }
            SectionTask::create([
                'main_tasks_id' => $id,
                'department_id' => Auth::user()->department_id,
                'eng_id' => Auth::user()->id,
                'action_take' => $request->action_take,
                'status' => 'completed',
                'engineer-notes' => $request->notes,
                'user_id' => Auth::user()->id,
                'date' => $date,
            ]);
        } else {
            SectionTask::create([
                'main_tasks_id' => $id,
                'department_id' => Auth::user()->department_id,
                'eng_id' => Auth::user()->id,
                'action_take' => $request->action_take,
                'status' => 'completed',
                'engineer-notes' => $request->notes,
                'user_id' => Auth::user()->id,
                'date' => $date
            ]);
            $main_task->update([
                'status' => 'completed',
            ]);
        }


        return redirect("/dashboard/user");
    }


    public function reportPage($id)
    {
        $section_task = SectionTask::where('main_tasks_id', $id)
            ->where('department_id', Auth::user()->department_id)
            ->where('status', 'completed')
            ->first();
        $files = TaskAttachment::where('main_tasks_id', $id)->get();

        if (!$section_task) {
            abort(404);
        }
        return view('dashboard.reportPage', compact('files', 'section_task'));
    }
    public function reportDepartment($main_task_id, $department_id)
    {
        $section_task = SectionTask::where('main_tasks_id', $main_task_id)
            ->where('department_id', $department_id)
            ->where('status', 'completed')
            ->first();
        $files = TaskAttachment::where('main_tasks_id', $main_task_id)->get();

        if (!$section_task) {
            abort(404);
        }
        return view('dashboard.reportPage', compact('files', 'section_task'));
    }
    public function showTasks($status)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $currentMonth = Carbon::now()->month;
        $isAdmin = Auth()->user()->role->title == 'Admin';
        $tasks = $isAdmin ? $this->getAdminTasks($status, $currentMonth) : $this->getEngineerTasks($status);

        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
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
                    ->whereMonth('created_at', $currentMonth)->latest()->paginate(6);

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
                return MainTask::where('eng_id', Auth::user()->id)
                    ->where('status', 'pending')
                    ->paginate(6);
            case 'completed':
                return MainTask::where('eng_id', Auth::user()->id)
                    ->where('status', 'completed')
                    ->latest()->paginate(6);
            case 'all':
                return MainTask::where('eng_id', Auth::user()->id)
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
        $tasks = MainTask::where('department_id', Auth::user()->department_id)
            ->where('station_id', $station->id)
            ->whereMonth('created_at', $currentMonth)->latest()->paginate(6);
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }
    public function engineerTasks(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        $engineer = User::where('name', $request->engineer)->first();;
        $tasks = MainTask::where('department_id', Auth::user()->department_id)
            ->where('eng_id', $engineer->id)
            ->whereMonth('created_at', $currentMonth)->latest()->paginate(6);
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
            dd($engineer);
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

        if ($task) {
            if ($task->previous_department_id && $task->previous_department_id !== Auth::user()->department_id) {
                $task->department_id = $task->previous_department_id;
                $task->save();
                return redirect()->back()->with('success', 'تم تغيير قسم المهمة بنجاح');
            }
            if ($task->department_id === Auth::user()->department_id) {
                $task->delete();
                return redirect()->back()->with('success', 'تم الحذف بنجاح');
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
}
