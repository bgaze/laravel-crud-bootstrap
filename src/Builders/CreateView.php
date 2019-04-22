<?php

namespace Bgaze\Crud\Themes\Bootstrap4\Builders;

use Bgaze\Crud\Themes\Classic\Builders\CreateView as Base;
use Bgaze\Crud\Core\Entry;

/**
 * The Create view builder.
 *
 * @author bgaze <benjamin@bgaze.fr>
 */
class CreateView extends Base {

    /**
     * Get the default template for a entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The template for the entry
     */
    public function defaultTemplate(Entry $entry) {
        return "{!! BootForm::text('EntryName') !!}";
    }

    /**
     * Get the template for a boolean entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The template for the entry
     */
    public function booleanTemplate(Entry $entry) {
        return "{!! BootForm::radios('EntryName', 'EntryLabel', [0 => 'No', 1 => 'Yes']) !!}";
    }

    /**
     * Get the template for a enum entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The template for the entry
     */
    public function enumTemplate(Entry $entry) {
        $choices = $entry->input()->getArgument('allowed');

        if ($entry->input()->getOption('nullable')) {
            array_unshift($choices, '');
        }

        $value = $this->compileArrayForPhp(array_combine($choices, $choices), true);

        return sprintf("{!! BootForm::select('EntryName', 'EntryLabel', %s) !!}", $value);
    }

    /**
     * Get the template for a text entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The template for the entry
     */
    public function textTemplate(Entry $entry) {
        return "{!! BootForm::textarea('EntryName') !!}";
    }

}
