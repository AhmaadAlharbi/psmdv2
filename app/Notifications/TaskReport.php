<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskReport extends Notification
{
    use Queueable;
    private $task;
    private $photos;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task, $photos)
    {
        $this->task = $task;
        $this->photos = $photos;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/engineer-task-page/' . $this->task->id);

        $message = (new MailMessage)

            // ->line('New Task from PSMD')
            // ->action('Notification Action', url('/'))
            // ->line('Thank you for using our application!');
            ->subject('New Task from PSMD')
            ->greeting('Hello!')
            ->line('Task to ' . $this->task->station->SSNAME . ' has been sent to you at ')
            ->action('عرض المهمة', $url)

            ->line('Please find the attached files:');
        foreach ($this->photos as $photo) {
            $message->attach(public_path('storage/attachments/' . $this->task->id . "/" . $photo->getClientOriginalName()));
        }

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
