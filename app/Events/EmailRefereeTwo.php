<?php

namespace App\Events;

use App\Applications;
use App\Events\Event;
use App\References;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EmailRefereeTwo extends Event
{
    use SerializesModels;

    public $referee;
    /**
     * @var Applications
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param $referee
     */
    public function __construct(References $referee, Applications $user)
    {
        $this->referee = $referee;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
