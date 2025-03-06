<?php

namespace App\Notifications;

use App\Models\Contribution;
use App\Models\Link;
use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContributionAcceptanceNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Contribution $contribution;
    /**
     * Create a new notification instance.
     */
    public function __construct(Contribution $contribution)
    {
        $this->afterCommit();
        $this->contribution=$contribution;
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
        return 'contribution-acceptance';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {   
        if($this->contribution->addable_type==Service::class){
            $contribution_type="service";
        }elseif($this->contribution->addable_type==Link::class){
            $contribution_type="link";
        }
        
        return [
          
            'contribution_id' => $this->contribution->id,
            'contribution_type' => $contribution_type,
                'status' => $this->contribution->status,
                'addable_id' => $this->contribution->addable_id,
        ];
    }



public function broadcastOn()
{
    return ['public-dummy-user.' . $this->contribution->dummy_user_id];
}
}