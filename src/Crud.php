<?php

namespace Bgaze\BootstrapCrudTheme;

use Bgaze\Crud\Theme\Crud as Base;
use Bgaze\BootstrapCrudTheme\Builders;

/**
 * Description of Crud
 *
 * @author bgaze
 */
class Crud extends Base {

    /**
     * The unique name of the CRUD theme.
     * 
     * @return string
     */
    static public function name() {
        return 'bootstrap';
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
            'views.index' => __DIR__ . '/Stubs/index.stub',
            'views.show' => __DIR__ . '/Stubs/show.stub',
            'views.create' => __DIR__ . '/Stubs/create.stub',
            'views.edit' => __DIR__ . '/Stubs/edit.stub',
        ]);
    }

    /**
     * The builders availables in the CRUD theme.
     * 
     * @return array Name as key, full class name as value.
     */
    static public function builders() {
        return array_merge(parent::builders(), [
            'create-view' => Builders\CreateView::class,
            'edit-view' => Builders\EditView::class,
        ]);
    }

}
