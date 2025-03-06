<?php

namespace App\Notifications;


use App\Models\Link;
use App\Models\Note;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoteNotification extends Notification implements ShouldQueue
{
    use Queueable;


    /**
     * Create a new notification instance.
     */
    public function __construct( protected Note $note)
    {
        $this->afterCommit();
      
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
        return 'note-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {   
        return [
            'icon' => "far fas fa-sticky-note text-dark",
            'route' =>route('service.show', $this->note->service->id),
          
            'message_title' => $this->note->service->title,
            
            'translation_key' =>"note-added",
      
        ];
    }
}