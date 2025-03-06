<?php

namespace App\Notifications;

use App\Models\Complaint;

use App\Models\Link;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    /**
     * Create a new notification instance.
     */
    public function __construct( protected Complaint $complaint)
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
        return 'complaint-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {   
   
        
        return [
           
            'icon' => "fas fa-angry text-danger",
            'route' =>route('admin.complaint.index'),
            'message_title' => $this->complaint->service->title,
            
            'translation_key' =>"complaint-added",
           
        ];
    }
}