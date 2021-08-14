<?php

namespace App\Listeners;

use App\Events\PostAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Repository\FacebookRepositoryInterface;
use App\Repository\SDKs\FacebookRepository;
use Illuminate\Support\Facades\Auth;

class CreateFacebookPost
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $facebookRepository;


    public function __construct(FacebookRepositoryInterface $facebookRepository)
    {
        $this->facebookRepository = $facebookRepository;
    }

    /**
     * Handle the event.
     *
     * @param  PostAdded  $event
     * @return void
     */
    public function handle(PostAdded $event)
    {
        $this->facebookRepository->setDefaultAccessToken(Auth::user()->facebook_access_token);
        $res = $this->facebookRepository->createPost([
            "post" => $event->post,
            "page_id" => $event->options["facebook"]["page"]
        ]);
    }
}
