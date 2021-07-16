<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PostAdded;
use App\Events\PostUpdated;
use App\Events\PostDeleted;
use App\Listeners\CreateFacebookPost;
use App\Listeners\UpdateFacebookPost;
use App\Listeners\DeleteFacebookPost;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostAdded::class => [
            CreateFacebookPost::class
        ],
        PostUpdated::class => [
            UpdateFacebookPost::class
        ],
        PostDeleted::class => [
            DeleteFacebookPost::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
