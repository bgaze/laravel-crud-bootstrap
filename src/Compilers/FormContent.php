<?php


namespace Bgaze\Crud\Themes\Bootstrap\Compilers;

use Bgaze\Crud\Support\Crud\Entry;
use Bgaze\Crud\Support\Utils\Helpers;
use Bgaze\Crud\Themes\Classic\Compilers\FormContent as BaseCompiler;
use Exception;

/**
 * Description of FormField
 *
 * @author bgaze
 */
class FormContent extends BaseCompiler
{

    /**
     * Compile a form group.
     *
     * @param  Entry  $entry  The entry to compile
     * @param  string  $template  The stub to use to compile a entry form group.
     * @return string
     * @throws Exception
     */
    protected function formGroup(Entry $entry, $template)
    {
        return Helpers::populateString($this->crud, $template, [
            'EntryLabel' => $entry->label(),
            'EntryName' => $entry->name(),
        ]);
    }


    /**
     * Get the default compilation function for an entry.
     *
     * @param  Entry  $entry  The entry
     * @return string The compiled entry
     * @throws Exception
     */
    public function default(Entry $entry)
    {
        return $this->formGroup($entry, "@text('EntryName', 'EntryLabel')");
    }


    /**
     * Get the form group for a boolean entry.
     *
     * @param  Entry  $entry  The entry
     * @return string The form group for the entry
     * @throws Exception
     */
    public function boolean(Entry $entry)
    {
        return $this->formGroup($entry, "@radios('EntryName', 'EntryLabel', [1 => 'Yes', 0 => 'No'])");
    }


    /**
     * Get the form group for a enum entry.
     *
     * @param  Entry  $entry  The entry
     * @return string The form group for the entry
     * @throws Exception
     */
    public function enum(Entry $entry)
    {
        $choices = $entry->argument('allowed');

        if ($entry->option('nullable')) {
            array_unshift($choices, '');
        }

        $value = Helpers::compileArrayForPhp(array_combine($choices, $choices), true);
        $stub = sprintf("@select('EntryName', 'EntryLabel', %s)", $value);

        return $this->formGroup($entry, $stub);
    }


    /**
     * Get the form group for a text entry.
     *
     * @param  Entry  $entry  The entry
     * @return string The form group for the entry
     * @throws Exception
     */
    public function text(Entry $entry)
    {
        return $this->formGroup($entry, "@textarea('EntryName', 'EntryLabel')");
    }

}
