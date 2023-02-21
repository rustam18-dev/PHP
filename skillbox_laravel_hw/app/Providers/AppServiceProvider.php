<?php

namespace App\Providers;

use App\Service\Pushall;
use App\Tag;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton('example', function () {
//            return 'hello';
//        });
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

       \Blade::component('components.alert', 'alert');

       \Blade::directive('datetime', function ($value) {
           return "<?= ($value)->toFormattedDateString() ?>";
       });

       \Blade::if('env', function ($env) {
           return app()->environment($env);
       });

    }
}