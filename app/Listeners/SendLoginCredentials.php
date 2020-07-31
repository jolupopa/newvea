<?php

namespace App\Listeners;

use App\Events\AdministratorCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginCredentials;

use Illuminate\Queue\InteractsWithQueue;

class SendLoginCredentials
{
    /**
     * Handle the event.
     *
     * @param  AdministratorCreated  $event
     * @return void
     */
    public function handle(AdministratorCreated $event)
    {
        Mail::to($event->administrator)->queue(
            new LoginCredentials($event->administrator, $event->password)
        );
    }
}
