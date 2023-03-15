<?php

namespace App\Providers;

use App\Models\Task;
use App\Repositories\TaskRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

/**
 * Summary of AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\TaskRepositoryInterface', 'App\Repositories\TaskRepositoryEloquent');
        $this->app->bind('App\Repositories\TaskRepositoryInterface', function(){
            return new TaskRepositoryEloquent(new Task());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
