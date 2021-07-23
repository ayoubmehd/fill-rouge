<?php

namespace App\Events;

use App\Models\CtmPost;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var $post
     */
    public $post;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CtmPost $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
    }
}
