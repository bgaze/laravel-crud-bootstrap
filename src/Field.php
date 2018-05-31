<?php

namespace Bgaze\CrudThemes\Bootstrap4;

use Bgaze\Crud\Theme\Field as Base;

/**
 * TODO
 *
 * @author bgaze
 */
class Field extends Base {

    /**
     * TODO
     * 
     * @return string
     */
    protected function getDefaultFormTemplate() {
        switch ($this->config('type')) {
            case 'boolean':
                return "Form::checkbox('FieldName', '1')";
            case 'array':
                return "Form::select('FieldName', " . compile_value_for_php($this->input->getArgument('allowed')) . ")";
            default:
                return "Form::text('FieldName')";
        }
    }

}
