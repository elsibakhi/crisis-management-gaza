<?php

namespace App\Notifications;


use App\Models\News;
use App\Models\Opinion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OpinionNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    /**
     * Create a new notification instance.
     */
    public function __construct(protected Opinion $opinion)
    {
      
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }


    public function broadcastAs()
    {
        return 'opinion-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'icon' => "fa fa-quote-right text-dark mr-5",
            'route' => route("admin.opinion.index"),
     
            'message_rating' => $this->opinion->rating,
            
            'translation_key' =>"opinion-added",
           
        ];
    }
}