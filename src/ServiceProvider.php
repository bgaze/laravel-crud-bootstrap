<?php

namespace Bgaze\Crud\Themes\Bootstrap4;

use Illuminate\Support\ServiceProvider as Base;
use Bgaze\Crud\Core\ThemeProviderTrait;
use Bgaze\Crud\Themes\Bootstrap4\Crud;

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
        $this->registerTheme(Crud::class);
    }

}
