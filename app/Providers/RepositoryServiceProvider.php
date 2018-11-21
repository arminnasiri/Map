<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/21/18
 * Time: 1:39 AM
 */

namespace App\Providers;


use App\Repositories\Contracts\PointRepositoryInterface;
use App\Repositories\Eloquent\EloquentPointRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PointRepositoryInterface::class,EloquentPointRepository::class);
    }
}