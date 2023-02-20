<?php

namespace App\Providers;

use App\Service\Pushall;
use Illuminate\Support\ServiceProvider;

class PushAllSericeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pushall::class, function () {

            return new Pushall(config('skillbox.pushall.api.key'));
        });
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
