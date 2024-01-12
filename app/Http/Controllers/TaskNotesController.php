<?php

namespace App\Http\Controllers;

use App\Models\TaskNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\department_task_assignment;

class TaskNotesController extends Controller
{
    public function index()
    {
    }
    public function create($department_task_id)
    {
        $task = department_task_assignment::where('id', $department_task_id)->first();
        return view('dashboard.taskNotes.create', compact('task'));
    }
    public function store(Request $request, $department_task_id)
    {
        $task = department_task_assignment::findOrFail($department_task_id);
        TaskNotes::create([
            'eng_id' => $task->eng_id,
            'user_id' => Auth::user()->id,
            'department_id' => Auth::user()->department_id,
            'department_task_assignment_id' => $task->id,
            'notes' => $request->notes
        ]);
        session()->flash('success', 'Note added successfully!');
        return back();
    }
    public function show($department_task_id)
    {
        $task = department_task_assignment::where('main_tasks_id', $department_task_id)->firstOrFail();
        if (!$task) {
            // Handle the case where the task is not found
            abort(404, 'Task not found');
        }
        $mainTask = $task->main_task;
        $report = $mainTask->section_tasks()->where('approved', 1)->where('isCompleted', "1")->first();
        $tasksNotes = TaskNotes::where('department_task_assignment_id', $task->id)->latest()->get();
        return view('dashboard.taskNotes.show', compact('task', 'tasksNotes', 'report'));
    }
}
