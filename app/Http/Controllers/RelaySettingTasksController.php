<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FileActivity;
use Illuminate\Http\Request;
use App\Models\RelayTaskFile;
use App\Models\RelaySettingTask;
use App\Models\RelaySettingTasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RelaySettingTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = RelaySettingTask::where('user_id', Auth::user()->id)->get();
        return view('relaySetting.tasks.index', ['tasks' => $tasks]);
    }

    public function showAssignTaskForm()
    {
        $users = User::all(); // You can customize this query based on your user model and requirements
        return view('relaySetting.tasks.create', ['users' => $users]);
    }

    public function assignTask(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user' => 'required|string',
        ]);

        // Get the user ID based on the provided user name
        $user = User::where('name', $request->input('user'))->first();

        if (!$user) {
            return redirect()->route('assignTask')->with('error', 'Invalid user selected');
        }

        $task =  RelaySettingTask::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $user->id,
            'assigned_by' => auth()->user()->id,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Process each uploaded file
                $path = $file->store("setting_tasks/$task->id", 'public');
                $fileTask = RelayTaskFile::create([
                    'task_id' => $task->id,
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path
                ]);
            }
        }


        return redirect()->route('realySetting.tasks.create')->with('success', 'Task assigned successfully');
    }
    public function getTaskFiles($id)
    {
        $tasks = RelayTaskFile::where('task_id', $id)->get();

        $files = [];

        foreach ($tasks as $file) {
            $files[] = Storage::url($file->path);
        }

        return view('relaySetting.tasks.files', ['tasks' => $tasks, 'files' => $files]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toggleCompletion($id)
    {
        $task = RelaySettingTask::findOrFail($id);
        $task->update(['status' => !$task->status]);
        $completionStatus = $task->status ? 'completed' : 'uncompleted';
        return redirect()->route('relaySetting.index')->with('success', "Task status has been updated successfully. The task is now $completionStatus.");
    }
    public function download($id)
    {
        // Use `withTrashed` to include trashed files
        $file = RelayTaskFile::withTrashed()->findOrFail($id);
        $filePath = storage_path('app/public/' . $file->path);
        return response()->download($filePath, $file->filename);
    }
    public function destroy($id)
    {
        $file = RelayTaskFile::findOrFail($id);
        // FileActivity::create([
        //     'filename' => $file->filename,
        //     'activity_type' => 'deleted',
        //     'user_id' => auth()->user()->id,
        //     'file_id' => $id
        // ]);
        $file->delete();

        // Add any additional logic after deleting the file

        return back()->with('success', 'File deleted successfully');
    }
    public function edit($id)
    {
        $task = RelayTaskFile::findOrFail($id);
        $users = User::all();
        return view('relaySetting.tasks.edit', compact('task', 'users'));
    }
}
