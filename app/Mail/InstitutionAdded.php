<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InstitutionAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
  
   
    public function __construct( public User $institution , public $password )
    {
  
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        
      $originalLocale = app()->getLocale();  // حفظ اللغة الأصلية

    app()->setLocale($this->institution->profile->locale);  // تغيير اللغة مؤقتًا إلى الإنجليزية
     $subject=__('You Added As Institution');
    app()->setLocale($originalLocale);  


return new Envelope(
            subject:$subject ,
        );


    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

   
        $content=new Content(
            view: 'components.mail.Institution_added',
         
        );
    
    
        return  $content ;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
