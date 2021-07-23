<?php

namespace App\Listeners;

use App\Events\PostAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreateFacebookPost
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
     * @param  PostAdded  $event
     * @return void
     */
    public function handle(PostAdded $event)
    {
        Log::info("Post created, Creating facebook post...");
    }
}
