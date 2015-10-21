<?php

namespace App\Events;

use App\Events\Event;
use App\Mailers\AppMailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReferenceRequestEmail extends Event
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param AppMailer $mailer
     */
    public function __construct($user)
    {
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
