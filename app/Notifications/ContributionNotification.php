<?php

namespace App\Notifications;

use App\Models\Contribution;
use App\Models\Link;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContributionNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    /**
     * Create a new notification instance.
     */
    public function __construct( protected Contribution $contribution)
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
        return 'contribution-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {   
        
        switch($this->contribution->addable_type){
            

            case Service::class:
                $icon="far fa-sun text-primary mr-5";
                $contribution_type="service";
                $route=route('admin.contribution.service.show',[$this->contribution->addable_id]);
              
            break;
            case Link::class:
                $icon="fas fa-link text-dark mr-5";
                $contribution_type="link";
                $route=route('admin.contribution.link.show',[$this->contribution->addable_id]);
            break;
           
        }
    
     
        return [
          
            'icon' => $icon,
            'route' => $route,
            'message_type' => $contribution_type,
            
            'translation_key' =>"contribution-added",
          
        ];
    }
}