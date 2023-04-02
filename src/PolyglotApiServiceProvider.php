<?php

declare(strict_types=1);

namespace Kalinkocode\PolyglotApi;

use Illuminate\Support\ServiceProvider;

class PolyglotApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'kalinkocode');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'kalinkocode');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/polyglot-api.php', 'polyglot-api');

        // Register the service the package provides.
        $this->app->singleton('polyglot-api', function ($app) {
            return new PolyglotApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['polyglot-api'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/polyglot-api.php' => config_path('polyglot-api.php'),
        ], 'polyglot-api.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/kalinkocode'),
        ], 'polyglot-api.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/kalinkocode'),
        ], 'polyglot-api.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/kalinkocode'),
        ], 'polyglot-api.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
