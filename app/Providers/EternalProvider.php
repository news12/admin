<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EternalProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\PremiumNeilItemRepository::class,
        \App\Repositories\PremiumNeilItemRepositoryEloquent::class);
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
