<?php


namespace Bgaze\Crud\Themes\Bootstrap\Tasks;

use Bgaze\Crud\Themes\Classic\Tasks\BuildCreateView as BaseTask;
use Bgaze\Crud\Themes\Bootstrap\Compilers\FormContent;

class BuildCreateView extends BaseTask
{
    /**
     * Compile view content.
     *
     * @return string
     */
    protected function getContent()
    {
        $compiler = new FormContent($this->crud);
        return $compiler->compile('<!-- TODO -->');
    }

}