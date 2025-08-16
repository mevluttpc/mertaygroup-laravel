<?php

namespace App\Notifications;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplicationReceived extends Notification
{
    use Queueable;

    public function __construct(
        public JobApplication $application
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Yeni İş Başvurusu Alındı')
                    ->greeting('Merhaba!')
                    ->line($this->application->jobListing->title . ' pozisyonu için yeni bir başvuru aldınız.')
                    ->line('Başvuran: ' . $this->application->applicant_name)
                    ->line('E-posta: ' . $this->application->applicant_email)
                    ->action('Başvuruyu İncele', url('/admin/applications/' . $this->application->id))
                    ->line('MertayGroup İş İlanları');
    }
}