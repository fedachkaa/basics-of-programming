<?php

namespace App\Notifications;

use App\Models\StudySection;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudySectionPassed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private StudySection $studySection, private int $result, private int $count)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'study_section_id'=> $this->studySection->id,
            'study_section_title'=> $this->studySection->title,
            'result'=>$this->result,
            'count'=>$this->count
        ];
    }
}
