<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\SectionTask;
use Illuminate\Support\Facades\Auth;

class NotificationBar extends Component
{
    public $usersNotifications = [];
    public $reportsNotifications = [];

    public function render()
    {
        return view('livewire.notification-bar');
    }

    public function mount()
    {
        $this->checkForPendingUsersApprovals();
        $this->checkForPendingReportsApprovals();
    }

    public function checkForPendingUsersApprovals()
    {
        $pendingUsers = User::where('approved', false)->get();
        if ($pendingUsers->isNotEmpty()) {
            // Get the name of the first user
            $firstUserName = $pendingUsers->first()->name;

            // Display a message with the name of the first user
            $this->usersNotifications[] = [
                'id' => $pendingUsers->first()->id,
                'type' => 'registration',
                'icon' => 'la la-user-check',
                'label' => $firstUserName . ' registered',
                'subtext' => $pendingUsers->count() > 1
                    ? ($pendingUsers->count() - 1) . ' others are also waiting for approval'
                    : null,
            ];
        }
        // foreach ($pendingUsers as $user) {
        //     $this->notifications[] = [
        //         'type' => 'approval',
        //         'icon' => 'la la-clock',
        //         'label' => $user->name . ' is waiting for approval',
        //         'subtext' => 'Registration pending',
        //     ];
        // }
    }
    public function checkForPendingReportsApprovals()
    {
        $reports = SectionTask::where('department_id', Auth::user()->department_id)
            ->where('isCompleted', "1")
            ->where('approved', 0)
            ->get();

        if ($reports->isNotEmpty()) {
            // Get the first report
            $firstReport = $reports->first();

            // Display a message with information about the first report
            $this->reportsNotifications[] = [
                'id' => $firstReport->id, // Add the ID of the user or report
                'type' => 'report',
                'icon' => 'la la-file-alt',
                'label' => $firstReport->main_task->station->SSNAME . ' report (Eng ID: ' . $firstReport->user->name . ') waiting for approval',
                'subtext' => $reports->count() > 1
                    ? ($reports->count() - 1) . ' other reports are also waiting for approval'
                    : null,
            ];
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