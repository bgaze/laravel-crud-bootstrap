<?php

namespace Bgaze\CrudThemes\Bootstrap4;

use Bgaze\Crud\Theme\Content as Base;
use Bgaze\CrudThemes\Bootstrap4\Field;

/**
 * TODO
 *
 * Test test
 * 
 * @author bgaze
 */
class Content extends Base {

    /**
     * 
     * @param type $field
     * @param type $question
     */
    protected function instantiateField($field, $question) {
        return new Field($this->crud, $field, $question);
    }

}
