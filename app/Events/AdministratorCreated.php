<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Administrator;

class AdministratorCreated
{
    use Dispatchable,  SerializesModels;

    public $administrator;
    public $password;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Administrator $administrator, $password)
    {
        $this->administrator = $administrator;
        $this->password = $password;
    }

    
}
