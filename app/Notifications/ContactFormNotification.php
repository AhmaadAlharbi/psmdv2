<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    protected $email;
    protected $subject;
    protected $message;
    public $userEmail;
    public $username;

    public function __construct($email, $subject, $message, $userEmail, $username)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->userEmail = $userEmail;
        $this->username = $username;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->line('A messege from ' . $this->username . " and his email is " . $this->userEmail)
            ->line($this->message);
    }
}
