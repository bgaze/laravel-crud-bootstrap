<?php

namespace Bgaze\BootstrapCrudTheme;

use Bgaze\Crud\Core\Field;
use Bgaze\Crud\Theme\FormBuilderTrait as Base;

/**
 *
 * @author bgaze
 */
trait FormBuilderTrait {

    use Base;

    /**
     * TODO
     * 
     * @return type
     */
    protected function formField(Field $field) {
        switch ($field->config('type')) {
            case 'boolean':
                return "BootForm::checkbox('FieldName', 'FieldLabel', '1')";
            case 'array':
                $choices = $field->input()->getArgument('allowed');
                if ($field->input()->getOption('nullable')) {
                    array_unshift($choices, '');
                }
                $choices = array_combine($choices, $choices);
                return sprintf("BootForm::select('FieldName', 'FieldLabel', %s)", $this->compileArrayForPhp($choices, true));
            case 'text':
                return "BootForm::textarea('FieldName', 'FieldLabel')";
            default:
                return "BootForm::text('FieldName', 'FieldLabel')";
        }
    }

}
