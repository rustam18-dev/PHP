<?php

namespace App\Providers;

use App\Service\Pushall;
use App\Tag;
use Blade;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
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

       Paginator::defaultSimpleView('pagination::simple-default');

//       Relation::morphMap([
//          'tasks' => '\App\Task',
//          'steps' => '\App\Steps',
//       ]);
    }
}
