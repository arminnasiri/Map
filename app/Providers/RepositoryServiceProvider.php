<?php

namespace App\Providers;

use App\Repositories\Contracts\PointRepositoryInterface;
use App\Repositories\Eloquent\EloquentPointRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PointRepositoryInterface::class,EloquentPointRepository::class);
    }
}
