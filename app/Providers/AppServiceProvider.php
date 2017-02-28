<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        //$this->app->singleton(FoodRepositoryInterface::class,FoodRepositoryEloquent::class);
        $this->app->bind('App\Contracts\FoodRepositoryInterface', 'App\Services\FoodRepositoryEloquent');


    }
}
