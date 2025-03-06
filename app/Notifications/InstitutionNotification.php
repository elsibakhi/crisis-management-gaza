<?php

namespace App\Notifications;

use App\Models\Complaint;

use App\Models\Link;
use App\Models\Service;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InstitutionNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    /**
     * Create a new notification instance.
     */
    public function __construct( protected User $institution)
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
        return 'institution-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {   
   
        
        return [
           
            'icon' => "fas fa-user text-secondary",
            'route' =>route('institution.show',[$this->institution->id]),
            'message_type' => $this->institution->institutionData->type ,
            'message_name' => $this->institution->name,
            'translation_key' =>"institution-added",
        ];
    }
}