<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CtmPostRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\CtmPostRepositoryInterface;
use App\Repository\FacebookRepositoryInterface;
use App\Repository\SDKs\FacebookRepository;
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
        $this->app->bind(FacebookRepositoryInterface::class, FacebookRepository::class);
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
