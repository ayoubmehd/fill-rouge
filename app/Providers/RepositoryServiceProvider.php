<?php

namespace App\Providers;

use App\Classes\FacebookSession;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CtmPostRepository;
use App\Repository\Eloquent\PlatformRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\PlatformRepositoryInterface;
use App\Repository\CtmPostRepositoryInterface;
use App\Repository\FacebookRepositoryInterface;
use App\Repository\SDKs\FacebookRepository;
use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CtmPostRepositoryInterface::class, CtmPostRepository::class);
        $this->app->bind(FacebookRepositoryInterface::class, function () {
            return new FacebookRepository(new Facebook([
                'default_graph_version' => 'v2.10',
                'persistent_data_handler' => new FacebookSession()
            ]));
        });
        $this->app->bind(PlatformRepositoryInterface::class, PlatformRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
