<?php

namespace Bgaze\Crud\Themes\Bootstrap4\Compilers;

use Bgaze\Crud\Themes\Classic\Compilers\FormContent as Base;
use Bgaze\Crud\Core\Entry;

/**
 * Description of FormField
 *
 * @author bgaze
 */
class FormContent extends Base {

    /**
     * Get the default compilation function for an entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The compiled entry
     */
    public function compileDefault(Entry $entry) {
        return $this->formGroup($entry, "{!! BootForm::text('EntryName') !!}");
    }

    /**
     * Get the form group for a boolean entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The form group for the entry
     */
    public function boolean(Entry $entry) {
        return $this->formGroup($entry, "{!! BootForm::radios('EntryName', 'EntryLabel', [0 => 'No', 1 => 'Yes']) !!}");
    }

    /**
     * Get the form group for a enum entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The form group for the entry
     */
    public function enum(Entry $entry) {
        $choices = $entry->argument('allowed');

        if ($entry->option('nullable')) {
            array_unshift($choices, '');
        }

        $value = $this->compileArrayForPhp(array_combine($choices, $choices), true);
        $stub = sprintf("{!! BootForm::select('EntryName', 'EntryLabel', %s) !!}", $value);

        return $this->formGroup($entry, $stub);
    }

    /**
     * Get the form group for a text entry.
     * 
     * @param Bgaze\Crud\Core\Entry $entry The entry 
     * @return string The form group for the entry
     */
    public function text(Entry $entry) {
        return $this->formGroup($entry, "{!! BootForm::textarea('EntryName') !!}");
    }

}
