<?php

namespace Jmrashed\Ecommerce;


use Illuminate\Support\ServiceProvider;
use Jmrashed\Ecommerce\Console\Commands\InstallEcommercePackage;

class EcommerceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallEcommercePackage::class,
            ]);
        }

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ecommerce');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'ecommerce');

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/ecommerce.php' => config_path('ecommerce.php'),
        ], 'config');


        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/jmrashed/ecommerce'),
        ], 'views');

        // Publish translations
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/jmrashed/ecommerce'),
        ], 'lang');



        // Publish assets
        $this->publishes(
            [
                __DIR__ . '/../resources/assets' => public_path('vendor/jmrashed/ecommerce'),
            ],
            'assets'
        );
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/ecommerce.php',
            'ecommerce'
        );
    }
}
