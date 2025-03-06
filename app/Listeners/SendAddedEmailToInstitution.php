<?php

namespace App\Listeners;

use App\Events\InstitutionAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\InstitutionAdded;
use Illuminate\Support\Facades\Mail;

class SendAddedEmailToInstitution
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InstitutionAddedEvent $event): void
    {
        //
        Mail::to( $event->institution->email)->send(
            new InstitutionAdded(
            $event->institution
            , $event->password
            )
        );
    }
}
