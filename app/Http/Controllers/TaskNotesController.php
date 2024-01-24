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
        if (Auth::user()->id != $task->eng_id) {
            $task->update([
                'isCompleted' => "0",
            ]);

            // $task->main_task->update([
            //     'isCompleted' => "0",
            // ]);
            if ($task->main_task && $task->main_task->section_tasks->isNotEmpty()) {
                $sectionTask = $task->main_task->section_tasks->first();

                if ($sectionTask) {
                    $sectionTask->update([
                        'isCompleted' => '1',
                        'approved' => 0,
                    ]);
                }
            }
        }

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
        // Retrieve task notes and order them by the latest date
        $tasksNotes = $task->task_note()->latest()->get();
        $mainTask = $task->main_task;
        $report = $mainTask->section_tasks()->where('isCompleted', "1")->where('eng_id', $task->eng_id)->first();
        return view('dashboard.taskNotes.show', compact('task', 'tasksNotes', 'report'));
    }
}