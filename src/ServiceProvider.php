<?php

namespace Bgaze\CrudThemes\Bootstrap4;

use Illuminate\Support\ServiceProvider as Base;
use Bgaze\CrudThemes\Bootstrap4\Crud;

class ServiceProvider extends Base {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // Register & publish theme views.
        $this->loadViewsFrom(__DIR__ . '/views', Crud::views());
        $this->publishes([__DIR__ . '/views' => resource_path('views/vendor/' . Crud::views())]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        // Register theme class.
        $this->app->singleton(Crud::name(), function ($app) {
            return new Crud($app->make('Illuminate\Filesystem\Filesystem'));
        });
    }

}
