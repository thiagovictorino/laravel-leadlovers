<?php

namespace Victorino\Leadlovers;

use Illuminate\Support\ServiceProvider;

class LeadloversServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/leadlovers.php' => config_path('leadlovers.php'),
        ], 'config-loeadlovers');

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/leadlovers.php', 'leadlovers');

        // Register the main class to use with the facade
        $this->app->singleton('leadlovers', function () {
            return new Leadlovers;
        });
    }
}
