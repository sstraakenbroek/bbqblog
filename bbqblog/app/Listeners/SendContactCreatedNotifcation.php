<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use App\Mail\ContactSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactCreatedNotifcation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ContactCreated  $event
     * @return void
     */
    public function handle(ContactCreated $event): void
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(
            new ContactSend($event->contact)
        );
    }
}
