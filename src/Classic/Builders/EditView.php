<?php

namespace Bgaze\Crud\Themes\Bootstrap\Classic\Builders;

use Bgaze\Crud\Themes\Bootstrap\Classic\Builders\CreateView;

/**
 * The Edit view builder
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class EditView extends CreateView {

    /**
     * The file that the builder generates.
     * 
     * @return string The absolute path of the file
     */
    public function file() {
        return resource_path('views/' . $this->crud->getPluralsKebabSlash() . "/edit.blade.php");
    }

    /**
     * Build the file.
     * 
     * @return string The relative path of the generated file
     */
    public function build() {
        return $this->buildForm('views.edit', 'partials.form-group');
    }

}
