<?php

namespace Bpocallaghan\Impersonate;

use Illuminate\Support\ServiceProvider;

class ImpersonateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'impersonate');

        // publish view
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/impersonate')
        ], 'view');

        // publish config
        $this->publishes([
            __DIR__ . '/config.php' => config_path('impersonate.php')
        ], 'config');

        // merge config
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'impersonate');

        // if in config to register the routes
        if (config('impersonate.register_routes')) {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('impersonate', function () {
            return $this->app->make(Impersonate::class);
        });
    }
}
