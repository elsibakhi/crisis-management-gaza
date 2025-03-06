<?php

namespace App\Notifications;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceNotification extends Notification implements ShouldQueue
{
    use Queueable;
         
    /**
     * Create a new notification instance.
     */
    public function __construct( protected Service $service)
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
        return 'service-added';
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $icon="";
        switch($this->service->type){
            

            case 'food':
                $icon="fas fa-utensils text-warning mr-5";
            break;
            case 'education':
                $icon="fas fa-book-open text-secondary mr-5";
            break;
            case 'health':
                $icon="flaticon-black text-danger mr-5";
            break;
        }
        return [

            'icon' => $icon,
            'route' =>route('service.show', $this->service->id),
          
                'message_type' => $this->service->type,
                'message_title' => $this->service->title,
            
                'translation_key' =>"service-added",
   
        ];
    }


}

