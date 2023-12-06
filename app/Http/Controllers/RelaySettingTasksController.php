<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FileActivity;
use Illuminate\Http\Request;
use App\Models\RelayTaskFile;
use App\Models\RelaySettingTask;
use App\Models\RelaySettingTasks;
use Illuminate\Support\Facades\Auth;
use App\Models\RelayTaskFilesActivity;
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
                    'path' => $path,
                    'user_id' => Auth::user()->id
                ]);
                RelayTaskFilesActivity::create([
                    'filename' => $file->getClientOriginalName(),
                    'activity_type' => 'created',
                    'user_id' => auth()->user()->id,
                    'file_id' => $fileTask->id
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

        return view('relaySetting.tasks.files', ['tasks' => $tasks, 'files' => $files, 'id' => $id]);
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

        RelayTaskFilesActivity::create([
            'filename' => $file->filename,
            'activity_type' => 'deleted',
            'user_id' => auth()->user()->id,
            'file_id' => $file->id
        ]);
        $file->delete();

        // Add any additional logic after deleting the file

        return back()->with('success', 'File deleted successfully');
    }
    public function showDeletedFiles($id)
    {
        $deletedFiles = RelayTaskFile::onlyTrashed()->where('task_id', $id)->get();
        $latestDeletedActivity = null;
        foreach ($deletedFiles as $file) {
            $latestDeletedActivity = $file->activity()->latest()->where('activity_type', 'deleted')->first();

            if ($latestDeletedActivity) {
                // Access the information of the user who deleted the file
                $deletedBy = $latestDeletedActivity->user;

                // Access other information as needed
                $deletedFilename = $latestDeletedActivity->filename;

                // Now you have information about the last user who deleted the file
            }
        }
        return view('relaySetting.tasks.trashFiles', compact('deletedFiles', 'latestDeletedActivity'));
    }
    public function restoreDeletedFile($id)
    {
        $file = RelayTaskFile::withTrashed()->findOrFail($id);
        $file->restore();

        // return redirect()->route('deleted-files.index')->with('success', 'File restored successfully');
        return redirect()->route('relay.tasks.edit', ['id' => $file->task_id])->with('success', 'File restored successfully');
    }
    public function edit($id)
    {
        $task = RelaySettingTask::findOrFail($id);
        $task_files = RelayTaskFile::where('task_id', $id)->get();
        $users = User::all();
        return view('relaySetting.tasks.edit', compact('task', 'users', 'task_files'));
    }
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        // Find the task by ID
        $task = RelaySettingTask::findOrFail($id);

        // Update task data
        $task->title = $request->input('title');
        $task->description = $request->input('description');

        // Handle file upload if provided
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Process each uploaded file
                $path = $file->store("setting_tasks/$task->id", 'public');
                $fileTask = RelayTaskFile::create([
                    'task_id' => $task->id,
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path,
                    'user_id' => Auth::user()->id
                ]);
                RelayTaskFilesActivity::create([
                    'filename' => $file->getClientOriginalName(),
                    'activity_type' => 'created',
                    'user_id' => auth()->user()->id,
                    'file_id' => $fileTask->id
                ]);
            }
        }

        // Save the updated task
        $task->save();

        // Redirect to a success page or wherever you want
        return back();
    }
}
