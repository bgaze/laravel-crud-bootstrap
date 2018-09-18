<?php

namespace Bgaze\Crud\Themes\Bootstrap;

use Illuminate\Support\ServiceProvider as Base;
use Bgaze\Crud\Support\ThemeProviderTrait;
use Bgaze\Crud\Themes\Bootstrap\Classic\Crud as ClassicTheme;

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
        $this->registerTheme(ClassicTheme::class, 'Generate a CRUD using Bootstrap 4 theme', __DIR__ . '/Classic/Views');
    }

}
