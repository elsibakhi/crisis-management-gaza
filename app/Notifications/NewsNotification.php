<?php

namespace App\Notifications;


use App\Models\News;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewsNotification extends Notification implements ShouldQueue
{
    use Queueable;

   
    /**
     * Create a new notification instance.
     */
    public function __construct(protected News $news)
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
        return 'news-added';
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'icon' => "fas fa-newspaper text-dark mr-5",
            'route' => route("news.index"),
            'message_title' => $this->news->title,
            
            'translation_key' =>"news-added",
       
            
           
        ];
    }
}