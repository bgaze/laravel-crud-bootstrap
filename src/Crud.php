<?php

namespace Bgaze\Crud\Themes\Bootstrap4;

use Bgaze\Crud\Themes\Classic\Crud as Base;
use Bgaze\Crud\Themes\Bootstrap4\Compilers;

/**
 * The core class of the theme
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Crud extends Base {

    /**
     * The unique name of the CRUD theme.
     * 
     * @return string
     */
    static public function name() {
        return 'crud:bootstrap4';
    }

    /**
     * The description the CRUD theme.
     * 
     * @return string
     */
    static public function description() {
        return 'Generate a classic CRUD using Bootstrap 4 theme: <fg=cyan>migration, model, factory, seeder, request, resource, controller, views, routes</>';
    }

    /**
     * The Theme base layout.
     * 
     * The default layout to extend in views.
     * 
     * @return string
     */
    static public function layout() {
        return static::viewsNamespace() . '::layout-cdn';
    }

    /**
     * The stubs availables in the CRUD theme.
     * 
     * @return array Name as key, absolute path as value.
     */
    static public function stubs() {
        return array_merge(parent::stubs(), [
            'partials.index-head' => __DIR__ . '/Stubs/partials/index-head.stub',
            'partials.index-body' => __DIR__ . '/Stubs/partials/index-body.stub',
            'partials.show-group' => __DIR__ . '/Stubs/partials/show-group.stub',
            'partials.form-group' => __DIR__ . '/Stubs/partials/form-group.stub',
            'views.index' => __DIR__ . '/Stubs/index-view.stub',
            'views.show' => __DIR__ . '/Stubs/show-view.stub',
            'views.create' => __DIR__ . '/Stubs/create-view.stub',
            'views.edit' => __DIR__ . '/Stubs/edit-view.stub',
        ]);
    }

    /**
     * The compilers availables in the CRUD theme.
     * 
     * @return array Name as key, full class name as value.
     */
    static public function compilers() {
        return array_merge(parent::compilers(), [
            'form-content' => Compilers\FormContent::class,
        ]);
    }

}
