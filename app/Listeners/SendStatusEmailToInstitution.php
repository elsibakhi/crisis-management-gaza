<?php

namespace App\Listeners;

use App\Events\InstitutionsChangeStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\InstitutionStatusChanging;
use Illuminate\Support\Facades\Mail;

class SendStatusEmailToInstitution
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
    public function handle(InstitutionsChangeStatus $event): void
    {
        //
        Mail::to( $event->institution->email)->send(
            new InstitutionStatusChanging(
            $event->institution
            , $event->status
            )
        );
    }
}
