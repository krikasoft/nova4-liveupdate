<?php

namespace Sfinktah\Nova4Liveupdate;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Sfinktah\MarkleArticle\Http\Middleware\Authorize;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova4-liveupdate', __DIR__.'/../dist/js/field.js');
            Nova::style('nova4-liveupdate', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }
        // Route::middleware(['nova', Authorize::class])
        Route::middleware(['nova'])
            ->prefix('live-update')
            ->group(__DIR__ . '/../routes/api.php');
    }
}
