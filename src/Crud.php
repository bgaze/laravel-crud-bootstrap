<?php

namespace Bgaze\CrudThemes\Bootstrap4;

use Bgaze\Crud\Theme\Crud as Base;
use Bgaze\CrudThemes\Bootstrap4\Field;

/**
 * The core class of the theme
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class Crud extends Base {

    /**
     * The unique name of the CRUD theme.
     * 
     * It is used to register Theme's singleton.
     * 
     * @return string
     */
    static public function name() {
        return 'crud-bootstrap4';
    }

    /**
     * TODO
     */
    protected function instantiateContent() {
        return new Content($this);
    }

    /**
     * Get a stub file relative to Theme's dir and return it's content.
     * 
     * Uses a dotted syntax, exemple :
     * 
     * 'my-parent-dir.my-stub' => 'theme-root-directory/stubs/my-parent-dir/my-stub.stub'
     * 
     * @param string $name The name of the stub
     * @return string
     */
    public function stub($name) {
        $stub = $this->stubInDir(__DIR__ . '/stubs', $name);

        if (empty($stub)) {
            return parent::stub($name);
        }

        return $stub;
    }

}
