<?php

namespace App\Http\Controllers;

use PDO;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\User;
use App\Models\Shift;
use App\Models\Station;
use App\Models\Engineer;
use App\Models\MainTask;
use App\Models\SectionTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\department_task_assignment;

class EngineersController extends Controller
{
    public function engineersList()
    {
        // Retrieve engineers based on the authenticated user's department
        // If the authenticated user's department is 1, retrieve all engineers
        // Otherwise, retrieve only the engineers who belong to the authenticated user's department
        $engineers = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('engineers.department_id', Auth::user()->department_id);
        })
            ->leftJoin('users', 'users.id', '=', 'engineers.user_id') // Assuming 'users' is the table name for the user model
            ->orderBy('users.arabic_name')
            ->get();
        $northEngineers = Engineer::whereHas('areas', function ($query) {
            $query->where('areas.id', 1);
        })->leftJoin('users', 'users.id', '=', 'engineers.user_id') // Assuming 'users' is the table name for the user model
            ->orderBy('users.arabic_name')

            ->get();
        $southEngineers = Engineer::whereHas('areas', function ($query) {
            $query->where('areas.id', 2);
        })->leftJoin('users', 'users.id', '=', 'engineers.user_id') // Assuming 'users' is the table name for the user model
            ->orderBy('users.arabic_name')

            ->get();

        $users = User::where('department_id', Auth::user()->department_id)->orderBy('arabic_name')->get();
        $areas = Area::all();
        $shifts = Shift::all();
        return view('dashboard.engineers.engineersList', compact('southEngineers', 'northEngineers', 'engineers', 'users', 'shifts', 'areas'));
    }
    // public function engineerProfile($id)
    // {
    //     $currentYear = date('Y');
    //     $currentMonth = date('m');
    //     $engineer = User::findOrFail($id);

    //     // Total tasks in general
    //     $totalTasks = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->count();

    //     // Total tasks in current month
    //     $tasksInMonth = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->whereYear('created_at', $currentYear)
    //         ->whereMonth('created_at', $currentMonth)
    //         ->count();
    //     //get All tasks in month
    //     $tasksMonthAll = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->whereMonth('created_at', $currentMonth)
    //         ->with(['main_task.section_tasks'])
    //         ->latest()
    //         ->get();
    //     $tasksYearAll = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->whereYear('created_at', $currentYear)
    //         ->with(['main_task.section_tasks'])
    //         ->latest()
    //         ->get();

    //     $tasksAll = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->with(['main_task.section_tasks'])
    //         ->latest()
    //         ->get();
    //     $tasksInYear = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->whereYear('created_at', $currentYear)
    //         ->count();

    //     // Completed tasks in general
    //     $completedTask = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "1")
    //         ->count();

    //     // Completed tasks in current month
    //     $completedTasksInMonth = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "1")
    //         ->whereYear('created_at', $currentYear)
    //         ->whereMonth('created_at', $currentMonth)
    //         ->count();

    //     // Completed tasks in current year
    //     $completedTasksInYear = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "1")
    //         ->whereYear('created_at', $currentYear)
    //         ->count();

    //     // Pending tasks in general
    //     $pendingTasks = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "0")
    //         ->count();

    //     // Pending tasks in current month
    //     $pendingTasksInMonth = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "0")
    //         ->whereYear('created_at', $currentYear)
    //         ->whereMonth('created_at', $currentMonth)
    //         ->count();

    //     // Pending tasks in current year
    //     $pendingTasksInYear = department_task_assignment::where('department_id', Auth::user()->department_id)
    //         ->where('eng_id', $id)
    //         ->where('isCompleted', "0")
    //         ->whereYear('created_at', $currentYear)
    //         ->count();

    //     // Completed and pending tasks for each month
    //     $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    //     $taskCounts = [];
    //     $pendingTaskCounts = [];
    //     $completedTaskCounts = [];
    //     foreach ($months as $month) {
    //         $taskCounts[] = department_task_assignment::where('department_id', Auth::user()->department_id)
    //             ->where('eng_id', $id)
    //             ->whereMonth('created_at', date('m', strtotime($month)))
    //             ->whereYear('created_at', $currentYear)
    //             ->count();

    //         $pendingTaskCounts[] = department_task_assignment::where('department_id', Auth::user()->department_id)
    //             ->where('eng_id', $id)
    //             ->whereMonth('created_at', date('m', strtotime($month)))
    //             ->where('status', 'pending')
    //             ->where('isCompleted', "0")
    //             ->whereYear('created_at', $currentYear)
    //             ->count();

    //         $completedTaskCounts[] = department_task_assignment::where('department_id', Auth::user()->department_id)
    //             ->where('eng_id', $id)
    //             ->whereMonth('created_at', date('m', strtotime($month)))
    //             ->where('isCompleted', "1")
    //             ->whereYear('created_at', $currentYear)
    //             ->count();
    //     }

    //     return view('dashboard.engineers.profile', compact(
    //         'tasksAll',
    //         'tasksYearAll',
    //         'tasksMonthAll',
    //         'tasksInYear',
    //         'totalTasks',
    //         'tasksInMonth',
    //         'completedTask',
    //         'completedTasksInMonth',
    //         'completedTasksInYear',
    //         'pendingTasks',
    //         'pendingTasksInMonth',
    //         'pendingTasksInYear',
    //         'months',
    //         'taskCounts',
    //         'pendingTaskCounts',
    //         'completedTaskCounts',
    //         'engineer'
    //     ));
    // }
    public function engineerProfile($id)
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $engineer = User::findOrFail($id);
        $departmentId = $engineer->department_id;

        // Total tasks in general
        $totalTasks = $this->countTasks($departmentId, $id);
        //Total pending Tasks in General
        $totalPendingTasks = $this->countTasks($departmentId, $id, null, null, "0");
        //Total Completed Tasks in General
        $totalCompletedTasks = $this->countTasks($departmentId, $id, null, null, "1");

        // pending Tasks count in year$
        $totalPendingTasksYear = $this->countTasks($departmentId, $id, $currentYear, null, "0");
        // Completed Tasks in year
        $totalCompletedTasksYear = $this->countTasks($departmentId, $id, $currentYear, null, "1");
        $totalTasksYear =  $totalPendingTasksYear +  $totalCompletedTasksYear;
        // Total tasks in current month
        $tasksInMonth = $this->countTasks($departmentId, $id, $currentYear, $currentMonth);

        // Get all tasks for the current month
        $tasksMonthAll = $this->getTasksByMonth($departmentId, $id, $currentYear, $currentMonth);

        // Get all tasks for the current year
        $tasksYearAll = $this->getTasksByYear($departmentId, $id, $currentYear);

        // Get all tasks
        $tasksAll = $this->getAllTasks($departmentId, $id);

        // Total tasks in current year
        $tasksInYear = $this->countTasks($departmentId, $id, $currentYear);

        // Completed tasks in general
        $completedTask = $this->countTasks($departmentId, $id, null, null, true);

        // Completed tasks in current month
        $completedTasksInMonth = $this->countTasks($departmentId, $id, $currentYear, $currentMonth, true);

        // Completed tasks in current year
        $completedTasksInYear = $this->countTasks($departmentId, $id, $currentYear, null, true);

        // Pending tasks in general
        $pendingTasks = $totalTasks - $completedTask;

        // Pending tasks in current month
        $pendingTasksInMonth = $tasksInMonth - $completedTasksInMonth;

        // Pending tasks in current year
        $pendingTasksInYear = $tasksInYear - $completedTasksInYear;

        // Completed and pending tasks for each month
        $taskCountsYearArr = [];
        $pendingTaskCountsYearArr = [];
        $completedTaskCountsYearArr = [];
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach ($months as $month) {
            $taskCountsYearArr[] = $this->countTasks($departmentId, $id, $currentYear, date('m', strtotime($month)));
            $pendingTaskCountsYearArr[] = $this->countTasks($departmentId, $id, $currentYear, date('m', strtotime($month)), '0');
            $completedTaskCountsYearArr[] = $this->countTasks($departmentId, $id, $currentYear, date('m', strtotime($month)), '1');
        }
        // Get tasks grouped by year
        $tasksByYear = $tasksAll->groupBy(function ($task) {
            return Carbon::parse($task->created_at)->format('Y');
        })->map(function ($tasks) {
            $totalTasks = $tasks->count();
            $completedTasksCount = $tasks->where('isCompleted', 1)->count();
            $pendingTasksCount = $totalTasks - $completedTasksCount;
            return [
                'total' => $totalTasks,
                'completed' => $completedTasksCount,
                'pending' => $pendingTasksCount,
            ];
        });


        return view('dashboard.engineers.profile', compact(
            'taskCountsYearArr',
            'pendingTaskCountsYearArr',
            'completedTaskCountsYearArr',
            'totalTasksYear',
            'totalCompletedTasks',
            'totalPendingTasks',
            'totalPendingTasksYear',
            'totalCompletedTasksYear',
            'tasksByYear',
            'tasksAll',
            'tasksYearAll',
            'tasksMonthAll',
            'tasksInYear',
            'totalTasks',
            'tasksInMonth',
            'completedTask',
            'completedTasksInMonth',
            'completedTasksInYear',
            'pendingTasks',
            'pendingTasksInMonth',
            'pendingTasksInYear',
            'months',
            'engineer'
        ));
    }

    private function countTasks($departmentId, $engineerId, $year = null, $month = null, $completed = null)
    {
        $query = department_task_assignment::where('department_id', $departmentId)
            ->where('eng_id', $engineerId);

        if (!is_null($year)) {
            $query->whereYear('created_at', $year);
        }

        if (!is_null($month)) {
            $query->whereMonth('created_at', $month);
        }

        if (!is_null($completed)) {
            $query->where('isCompleted', $completed);
        }

        return $query->count();
    }

    private function getTasksByMonth($departmentId, $engineerId, $year, $month)
    {
        return department_task_assignment::where('department_id', $departmentId)
            ->where('eng_id', $engineerId)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->with(['main_task.section_tasks'])
            ->latest()
            ->get();
    }

    private function getTasksByYear($departmentId, $engineerId, $year)
    {
        return department_task_assignment::where('department_id', $departmentId)
            ->where('eng_id', $engineerId)
            ->whereYear('created_at', $year)
            ->with(['main_task.section_tasks'])
            ->latest()
            ->get();
    }

    private function getAllTasks($departmentId, $engineerId)
    {
        return department_task_assignment::where('department_id', $departmentId)
            ->where('eng_id', $engineerId)
            ->with(['main_task.section_tasks'])
            ->latest()
            ->get();
    }


    public function engineerTask($id, $status)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        switch ($status) {
            case 'pending':
                $tasks = department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->where('isCompleted', "0")
                    ->where('eng_id', $id)
                    ->latest()
                    ->paginate(6);
                break;
            case 'completed':
                $tasks = department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->where('isCompleted', "1")
                    ->where('eng_id', $id)
                    ->latest()
                    ->paginate(6);
                break;

            case 'all':
                $tasks = department_task_assignment::where('department_id', Auth::user()->department_id)
                    ->where('eng_id', $id)
                    ->latest()
                    ->paginate(6);
                break;
            default:
                abort(404);
        }
        return view('dashboard.showTasks', compact('tasks', 'stations', 'engineers'));
    }
    public function edit($id)
    {
        $engineer = Engineer::findOrFail($id);
        $areas = Area::all();
        $shifts = Shift::all();
        return view('dashboard.engineers.edit', compact('engineer', 'areas', 'shifts'));
    }
    public function update(Request $request, $id)
    {
        // Find the engineer by ID
        $engineer = Engineer::findOrFail($id);

        // Validate the request data if necessary

        // Update the engineer's areas and shifts
        $selectedAreas = $request->input('area', []);
        $selectedShifts = $request->input('shift', []);

        // Sync the engineer's assigned areas with the selected areas
        $engineer->areas()->sync($selectedAreas);

        // Sync the engineer's assigned shifts with the selected shifts
        $engineer->shifts()->sync($selectedShifts);

        session()->flash('success', 'The Engineer details have been updated');
        return redirect()->route('dashboard.engineersList');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function toggleEngineer($id)
    {
        $user = User::findOrFail($id);
        $engineer = $user->engineer;
        if ($engineer && $engineer->exists()) {
            // Set department_id to null instead of deleting the record
            $engineer->update(['department_id' => null]);
            return redirect()->back()->with('success', 'تم إخفاء المهندس');
        } else {
            Engineer::create([
                'user_id' => $user->id,
                'department_id' => Auth::user()->department_id,
                'area' => 1,
                'shift' => 0
            ]);
            return redirect()->back()->with('success', 'تم إضافة المهندس');
        }
    }
    public function addEngineer(Request $request)
    {
        // Get the user ID from the request
        $user_id = $request->userId;
        // Get the selected shifts and areas from the request
        $selectedShifts = $request->input('shift', []);
        $selectedAreas = $request->input('area', []);
        // Find the user by their ID
        $user = User::findOrFail($user_id);
        // If the user doesn't exist, abort with a 404 error
        if (!$user) {
            abort(404);
        }
        // Create an engineer record for each selected area and shift combination
        foreach ($selectedAreas as $areaId) {
            foreach ($selectedShifts as $shiftId) {
                // Find or create an engineer record based on user and department
                $engineer = Engineer::firstOrCreate([
                    'user_id' => $user_id,
                    'department_id' => Auth::user()->department_id,
                ]);

                // Attach the engineer to the selected area
                $engineer->areas()->attach($areaId);

                // Attach the engineer to the selected shift
                $engineer->shifts()->attach($shiftId);
            }
        }

        // Redirect back to the previous page
        return back();
    }
}
