<?php

namespace Bgaze\BootstrapCrudTheme;

use Illuminate\Support\ServiceProvider as Base;
use Bgaze\Crud\Support\ThemeProviderTrait;
use Bgaze\BootstrapCrudTheme\Crud;

/**
 * The package service provider
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class ServiceProvider extends Base {

    use ThemeProviderTrait;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        // Register & publish theme.
        $this->registerTheme(Crud::class, 'Generate a CRUD using Bootstrap 4 theme', __DIR__ . '/Views');
    }

}
