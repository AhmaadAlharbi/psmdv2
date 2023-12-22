<?php

namespace App\Http\Livewire;

use App\Models\department_task_assignment;
use App\Models\User;
use Livewire\Component;
use App\Models\MainTask;
use App\Models\SectionTask;
use App\Models\TaskConversions;
use Illuminate\Support\Facades\Auth;

class NotificationBar extends Component
{
    public $usersNotifications = [];
    public $reportsNotifications = [];
    public $incomingTasksConvertedNotifications = []; // Incoming tasks
    public $outgoingTasksConvertedNotifications = []; // Outgoing tasks
    public $totalNotifications = 0;
    public $usersNotificationsCount = 0;
    public $reportsNotificationsCount = 0;
    public $incomingTasksNotificationsCount = 0;
    public function render()
    {
        return view('livewire.notification-bar');
    }

    public function mount()
    {
        $this->checkForPendingUsersApprovals();
        $this->checkForPendingReportsApprovals();
        $this->checkForIncomingTasks();
    }

    public function checkForPendingUsersApprovals()
    {
        $department_id = Auth::user()->department_id;
        $pendingUsers = User::where('approved', false)
            ->where('department_id', $department_id)
            ->get();

        // Calculate the count of new notifications
        $newNotificationsCount = $pendingUsers->count();

        // Update the total notifications count and specific type count
        $this->totalNotifications += $newNotificationsCount;
        $this->usersNotificationsCount = $newNotificationsCount;

        // Process each pending user and add to notifications
        foreach ($pendingUsers as $pendingUser) {
            $this->usersNotifications[] = [
                'id' => $pendingUser->id,
                'type' => 'registration',
                'icon' => 'la la-user-check',
                'label' => $pendingUser->name . ' registered',
                'subtext' => $newNotificationsCount > 1
                    ? ($newNotificationsCount - 1) . ' others are also waiting for approval'
                    : null,
            ];
        }
    }
    // public function checkForPendingReportsApprovals()
    // {
    //     $reports = SectionTask::where('department_id', Auth::user()->department_id)
    //         ->where('isCompleted', "1")
    //         ->where('approved', 0)
    //         ->get();

    //     if ($reports->isNotEmpty()) {
    //         // Get the first report
    //         $firstReport = $reports->first();

    //         // Display a message with information about the first report
    //         $this->reportsNotifications[] = [
    //             'id' => $firstReport->id, // Add the ID of the user or report
    //             'type' => 'report',
    //             'icon' => 'la la-file-alt',
    //             'label' => $firstReport->main_task->station->SSNAME . ' report (Eng ID: ' . $firstReport->user->name . ') waiting for approval',
    //             'subtext' => $reports->count() > 1
    //                 ? ($reports->count() - 1) . ' other reports are also waiting for approval'
    //                 : null,
    //         ];
    //     }
    // }
    public function checkForPendingReportsApprovals()
    {
        $reports = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->where('approved', 0)
            ->get();

        // Calculate the count of new notifications
        $newNotificationsCount = $reports->count();

        // Update the total notifications count and specific type count
        $this->totalNotifications += $newNotificationsCount;
        $this->reportsNotificationsCount = $newNotificationsCount;

        // Process each pending report and add to notifications
        foreach ($reports as $report) {
            $this->reportsNotifications[] = [
                'id' => $report->id,
                'type' => 'report',
                'icon' => 'la la-file-alt',
                'label' => $report->main_task->station->SSNAME . ' report (Eng ID: ' . $report->user->name . ') waiting for approval',
                'subtext' => $newNotificationsCount > 1
                    ? ($newNotificationsCount - 1) . ' other reports are also waiting for approval'
                    : null,
            ];
        }
    }

    // public function checkForIncomingTasks()
    // {
    //     $user = auth()->user();

    //     // Check if the user is authenticated and has a department_id
    //     if ($user && $user->department_id) {
    //         $department_id = $user->department_id;

    //         // Use a more explicit query to avoid potential issues
    //         $task_converted = TaskConversions::where('destination_department', $department_id)
    //             ->where('is_notified', false)
    //             ->get();

    //         // Calculate the count of new notifications
    //         $newNotificationsCount = $task_converted->count();

    //         // Update the total notifications count and specific type count
    //         $this->totalNotifications += $newNotificationsCount;
    //         $this->incomingTasksNotificationsCount = $newNotificationsCount;

    //         // Process each converted task and add to notifications
    //         foreach ($task_converted as $task) {
    //             // Utilize optional() to handle potential null values more gracefully
    //             $label = optional($task->main_task->station)->SSNAME ?? 'Unknown Station';

    //             $this->incomingTasksConvertedNotifications[] = [
    //                 'type' => 'converted',
    //                 'icon' => 'la la-refresh', // Updated icon
    //                 'label' => $label,
    //                 'subtext' => "A task is being converted from {$task->department->name}",
    //             ];
    //         }
    //     }
    // }
    // public function checkForIncomingTasks()
    // {
    //     $user = auth()->user();

    //     // Check if the user is authenticated and has a department_id
    //     if ($user && $user->department_id) {
    //         $department_id = $user->department_id;
    //         // Use a more explicit query to avoid potential issues
    //         $task_converted = TaskConversions::where('destination_department', $department_id)
    //             // ->where('is_notified', false)
    //             ->get();

    //         // Process each converted task and add to notifications
    //         $tasks =  MainTask::with(['sharedDepartments'])
    //             ->whereHas('sharedDepartments', function ($query) use ($department_id) {
    //                 $query->where('department_id', Auth::user()->department_id);
    //             })
    //             ->get();
    //         foreach ($tasks as $task) {
    //             // Utilize optional() to handle potential null values more gracefully
    //             $label = optional($task->station)->SSNAME ?? 'Unknown Station';

    //             // Check if the task is new or has been updated
    //             $notificationType = $task->is_notified ? 'updated' : 'new';

    //             // Determine the appropriate message based on the notification type
    //             $message = ($notificationType === 'new')
    //                 ? "A new task is being converted from "
    //                 : "A task has been updated and is being converted from ";

    //             // Update the total notifications count and specific type count
    //             $this->totalNotifications++;
    //             $this->incomingTasksNotificationsCount++;

    //             // // Mark the task as notified
    //             // $task->update(['is_notified' => true]);

    //             // Add the notification to the array
    //             $this->incomingTasksConvertedNotifications[] = [
    //                 'type' => 'converted',
    //                 'icon' => 'la la-refresh', // Updated icon
    //                 'label' => $label,
    //                 'subtext' => $message,
    //             ];
    //         }
    //         return $tasks;
    //     }
    // }
    public function checkForIncomingTasks()
    {
        $user = auth()->user();

        // Check if the user is authenticated and has a department_id
        if ($user && $user->department_id) {
            $department_id = $user->department_id;
            // Use a more explicit query to avoid potential issues
            $tasks =  MainTask::with(['sharedDepartments'])
                ->whereHas('sharedDepartments', function ($query) use ($department_id) {
                    $query->where('department_id', Auth::user()->department_id);
                })
                ->where('updated_by_department_id', '!=', Auth::user()->department_id)
                ->where('notified', true) // Only get tasks that haven't been notified
                ->get();

            // foreach ($tasks as $task) {

            //     // Process each converted task and add to notifications
            //     // Utilize optional() to handle potential null values more gracefully
            //     $label = optional($task->station)->SSNAME ?? 'Unknown Station';
            //     // Determine the appropriate message based on the notification type
            //     $message = "Action is required for this station ";
            //     // Update the total notifications count and specific type count
            //     $this->totalNotifications++;
            //     $this->incomingTasksNotificationsCount++;
            //     // Add the notification to the array

            //     $this->incomingTasksConvertedNotifications[] = [
            //         'id' => $task->departmentsAssienments->id,
            //         'type' => 'converted',
            //         'icon' => 'la la-refresh', // Updated icon
            //         'label' => $label,
            //         'subtext' => $message,
            //     ];

            //     // Mark the task as notified
            //     // $task->update(['notified' => false]);
            // }

            foreach ($tasks as $task) {
                foreach ($task->departmentsAssienments as $departmentAssignment) {
                    // Check if the department_id is different from the current user's department_id
                    if ($departmentAssignment->department_id != Auth::user()->department_id) {
                        $label = optional($task->station)->SSNAME ?? 'Unknown Station';
                        $message = "The task has been updated by the " . $departmentAssignment->department->name;

                        $this->totalNotifications++;
                        $this->incomingTasksNotificationsCount++;

                        $this->incomingTasksConvertedNotifications[] = [
                            'id' => $task->id, // to show it based on department task id
                            'department_task_id' => $departmentAssignment->id, //
                            'type' => 'converted',
                            'icon' => 'la la-refresh',
                            'label' => $label,
                            'subtext' => $message,
                        ];

                        // Mark the task as notified
                        // $task->update(['notified' => false]);
                    }
                }
            }
            // foreach ($tasks as $task) {
            //     // Retrieve the first related department_task_assignment
            //     $departmentAssignment = $task->departmentsAssienments->first();

            //     if ($departmentAssignment) {
            //         $label = optional($task->station)->SSNAME ?? 'Unknown Station';
            //         $message = "The task has been updated by the " . $departmentAssignment->department->name;


            //         $this->totalNotifications++;
            //         $this->incomingTasksNotificationsCount++;

            //         $this->incomingTasksConvertedNotifications[] = [
            //             'id' => $departmentAssignment->id, //to show it based on department task id
            //             'type' => 'converted',
            //             'icon' => 'la la-refresh',
            //             'label' => $label,
            //             'subtext' => $message,
            //         ];

            //         // Mark the task as notified
            //         // $task->update(['notified' => false]);
            //     }
            // }

            return $tasks;
        }
    }




    public function markAsRead($id)
    {
        // Find the department_task_assignment by ID
        // $departmentTask = department_task_assignment::findOrFail($id);

        // Find the associated MainTask
        $mainTask = MainTask::findOrFail($id);

        // Check authorization (customize this based on your app's logic)

        // Update the 'notified' attribute
        $mainTask->update(['notified' => false]);
    }
}