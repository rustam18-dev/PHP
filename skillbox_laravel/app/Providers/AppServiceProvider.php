<?php

namespace App\Providers;

use App\Service\Pushall;
use App\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        \Illuminate\Support\Collection::macro('toUpper', function () {
            return $this->map(function (string $value) {
                return Str::upper($value);
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });
    }

}
