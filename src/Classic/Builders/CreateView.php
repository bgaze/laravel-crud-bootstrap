<?php

namespace Bgaze\Crud\Themes\Bootstrap\Classic\Builders;

use Bgaze\Crud\Themes\Classic\Builders\CreateView as Base;
use Bgaze\Crud\Core\Field;

/**
 * The Create view builder.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class CreateView extends Base {

    /**
     * Get the default template for a field.
     * 
     * @param Bgaze\Crud\Core\Field $field The field 
     * @return string The template for the field
     */
    public function defaultTemplate(Field $field) {
        return "{!! BootForm::text('FieldName') !!}";
    }

    /**
     * Get the template for a boolean field.
     * 
     * @param Bgaze\Crud\Core\Field $field The field 
     * @return string The template for the field
     */
    public function booleanTemplate(Field $field) {
        return "{!! BootForm::radios('FieldName', 'FieldLabel', [0 => 'No', 1 => 'Yes']) !!}";
    }

    /**
     * Get the template for a enum field.
     * 
     * @param Bgaze\Crud\Core\Field $field The field 
     * @return string The template for the field
     */
    public function enumTemplate(Field $field) {
        $choices = $field->input()->getArgument('allowed');

        if ($field->input()->getOption('nullable')) {
            array_unshift($choices, '');
        }

        $value = $this->compileArrayForPhp(array_combine($choices, $choices), true);

        return sprintf("{!! BootForm::select('FieldName', 'FieldLabel', %s) !!}", $value);
    }

    /**
     * Get the template for a text field.
     * 
     * @param Bgaze\Crud\Core\Field $field The field 
     * @return string The template for the field
     */
    public function textTemplate(Field $field) {
        return "{!! BootForm::textarea('FieldName') !!}";
    }

}
