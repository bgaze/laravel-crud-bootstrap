<?php

namespace Bgaze\Crud\Themes\Bootstrap;

use Bgaze\BladeIndenter\BladeIndenter;
use Illuminate\Support\ServiceProvider as Base;

/**
 * The Classic theme service provider
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class ServiceProvider extends Base
{

    /**
     * Bootstrap the theme services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish theme configuration.
        $this->publishes([__DIR__ . '/Config/crud-bootstrap.php' => config_path('crud-bootstrap.php')], 'crud-config');

        // Register & publish default theme views.
        $this->loadViewsFrom(__DIR__ . '/Views', 'crud-bootstrap');
        $this->publishes([__DIR__ . '/Views' => resource_path('views/vendor/crud-bootstrap')], 'crud-bootstrap-views');

        // Register bootstrap form blade directive to Blade formatter
        resolve(BladeIndenter::class)
            ->addClosingDirectives([
                'open' => 'close',
                'vertical' => 'close',
                'horizontal' => 'close',
                'inline' => 'close',
            ])
            ->addSelfClosingDirectives([
                'text', 'email', 'url', 'tel', 'number', 'date', 'time', 'textarea',
                'password', 'file', 'hidden', 'select', 'range', 'checkbox', 'checkboxes',
                'radio', 'radios', 'label', 'submit', 'reset', 'button', 'link',
            ]);
    }


    /**
     * Register the theme services.
     *
     * @return void
     */
    public function register()
    {
        // Merge theme configuration.
        $this->mergeConfigFrom(__DIR__ . '/Config/crud-bootstrap.php', 'crud-bootstrap');

        // Register theme console command.
        if ($this->app->runningInConsole()) {
            $this->commands(Command::class);
        }
    }
}
