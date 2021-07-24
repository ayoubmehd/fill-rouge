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

class PostAdded
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var $post
     */
    public $post;
    public $options;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CtmPost $post, array $options)
    {
        $this->post = $post;
        $this->options = $options;
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
