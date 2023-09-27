<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Area;
use App\Models\User;
use App\Models\Shift;
use App\Models\Station;
use App\Models\Engineer;
use App\Models\MainTask;
use App\Models\SectionTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngineersController extends Controller
{
    public function engineersList()
    {
        // Retrieve engineers based on the authenticated user's department
        // If the authenticated user's department is 1, retrieve all engineers
        // Otherwise, retrieve only the engineers who belong to the authenticated user's department
        $engineers = Engineer::when(Auth::user()->department_id !== 1, function ($query) {
            return $query->where('department_id', Auth::user()->department_id);
        })->get();
        $users = User::where('department_id', Auth::user()->department_id)->orderBy('name')->get();
        $areas = Area::all();
        $shifts = Shift::all();
        return view('dashboard.engineers.engineersList', compact('engineers', 'users', 'shifts', 'areas'));
    }
    public function engineerProfile($id)
    {
        $engineer = User::findOrfail($id);
        $tasks = MainTask::where('department_id', Auth::user()->department_id)->where('eng_id', $id)->count();
        $pendingTasks = MainTask::where('department_id', Auth::user()->department_id)->where('eng_id', $id)->where('status', 'pending')->count();
        $completedTasks = MainTask::where('department_id', Auth::user()->department_id)->where('eng_id', $id)->where('status', 'pending')->count();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $taskCounts = [];
        $pendingTaskCounts = [];
        $completedTaskCounts = [];

        foreach ($months as $month) {
            $taskCounts[] = MainTask::where('department_id', Auth::user()->department_id)
                ->where('eng_id', $id)
                ->whereMonth('created_at', date('m', strtotime($month)))
                ->count();

            $pendingTaskCounts[] = MainTask::where('department_id', Auth::user()->department_id)
                ->where('eng_id', $id)
                ->whereMonth('created_at', date('m', strtotime($month)))
                ->where('status', 'pending')
                ->count();

            $completedTaskCounts[] = MainTask::where('department_id', Auth::user()->department_id)
                ->where('eng_id', $id)
                ->whereMonth('created_at', date('m', strtotime($month)))
                ->where('status', 'completed')
                ->count();
        }
        return view('dashboard.engineers.profile', compact('tasks', 'pendingTasks', 'completedTasks', 'months', 'taskCounts', 'pendingTaskCounts', 'completedTaskCounts', 'engineer', 'months', 'taskCounts', 'pendingTaskCounts', 'completedTaskCounts'));
    }
    public function engineerTask($id, $status)
    {
        $stations = Station::all();
        $engineers = Engineer::where('department_id', Auth::user()->department_id)->get();
        switch ($status) {
            case 'pending':
                $tasks = MainTask::where('department_id', Auth::user()->department_id)
                    ->where('status', 'pending')
                    ->where('eng_id', $id)
                    ->latest()
                    ->paginate(6);
                break;
            case 'completed':
                $tasks = MainTask::where('department_id', Auth::user()->department_id)
                    ->where('status', 'completed')
                    ->where('eng_id', $id)
                    ->latest()
                    ->paginate(6);
                break;

            case 'all':
                $tasks = MainTask::where('department_id', Auth::user()->department_id)
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
