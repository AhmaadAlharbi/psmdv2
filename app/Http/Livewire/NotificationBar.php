<?php

namespace App\Http\Livewire;

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
            // $taskConversions = TaskConversions::where('destination_department', $department_id)->get();
            $tasks =  MainTask::with(['sharedDepartments'])
                ->whereHas('sharedDepartments', function ($query) use ($department_id) {
                    $query->where('department_id', Auth::user()->department_id);
                })
                ->get();
            foreach ($tasks as $task) {


                // Process each converted task and add to notifications
                // Utilize optional() to handle potential null values more gracefully

                $label = optional($task->station)->SSNAME ?? 'Unknown Station';
                // Determine the appropriate message based on the notification type
                $message = "Action is required for this station ";
                // Update the total notifications count and specific type count
                $this->totalNotifications++;
                $this->incomingTasksNotificationsCount++;
                // Add the notification to the array
                $this->incomingTasksConvertedNotifications[] = [
                    'type' => 'converted',
                    'icon' => 'la la-refresh', // Updated icon
                    'label' => $label,
                    'subtext' => $message,
                ];
            }


            return $tasks;
        }
    }


    public function checkForOutgoingTasks()
    {
        $user = auth()->user();
        // Check if the user is authenticated and has a department_id
        if ($user && $user->department_id) {
            $department_id = $user->department_id;

            // Use a more explicit query to avoid potential issues
            $task_converted = TaskConversions::Where('source_department', $department_id)
                ->get();
            // Check if there are any converted tasks
            if ($task_converted->isNotEmpty()) {
                foreach ($task_converted as $task) {
                    // Utilize optional() to handle potential null values more gracefully
                    $label = optional($task->main_task->station)->SSNAME ?? 'Unknown Station';
                    // Check if the task is being converted from or to the user's department
                    $this->incomingTasksConvertedNotifications[] = [
                        'type' => 'converted',
                        'icon' => 'la la-refresh', // Updated icon
                        'label' => $label,
                        'subtext' => "A task is being converted from {$task->department->name}",


                    ];
                }
            }
        }
    }

    // In your NotificationBar Livewire component

    public function markNotificationAsRead($notificationType, $id)
    {
        if ($notificationType === 'registration') {
            $user = User::findOrFail($id);
            $user->update(['is_notified' => true]);

            // Remove the clicked user from the notifications array
            $this->usersNotifications = array_filter($this->usersNotifications, function ($notification) use ($id) {
                return $notification['id'] !== $id;
            });
        } elseif ($notificationType === 'report') {
            $report = SectionTask::findOrFail($id);
            $report->update(['is_notified' => true]);

            // Remove the clicked report from the notifications array
            $this->reportsNotifications = array_filter($this->reportsNotifications, function ($notification) use ($id) {
                return $notification['id'] !== $id;
            });
        }
    }
}
