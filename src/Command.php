<?php

namespace Bgaze\Crud\Themes\Bootstrap;

use Bgaze\Crud\Themes\Classic\Command as BaseCommand;

class Command extends BaseCommand
{
    /**
     * Theme's layout
     */
    const DEFAULT_LAYOUT = 'crud-bootstrap::layout-cdn';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "crud:bootstrap 
            {model : The FullName of the Model}
            {--p|plurals= : The Plurals version of the Model's name}
            {--o|only=* : Execute only provided tasks}
            {--l|layout= : The layout to extend into generated views}
            {--t|timestamps : Add a timestamps directive}
            {--s|soft-deletes : Add a softDelete directive}
            {--c|content=* : The list of Model's entries using SignedInput syntax}
            {--f|force : Overwrite any existing file}";

    /**
     * The console command description.
     *
     * @var string|null
     */
    protected $description = "Generate a Bootstrap 4 CRUD";


    /**
     * The stubs available in the CRUD theme.
     *
     * @return array Name as key, absolute path as value.
     */
    public function stubs()
    {
        return array_merge(parent::stubs(), [
            'views.index' => __DIR__ . '/Stubs/index-view.blade.stub',
            'views.show' => __DIR__ . '/Stubs/show-view.blade.stub',
            'views.create' => __DIR__ . '/Stubs/create-view.blade.stub',
            'views.edit' => __DIR__ . '/Stubs/edit-view.blade.stub',
        ]);
    }


    /**
     * The tasks available in the CRUD theme.
     *
     * @return array Name as key, full class name as value.
     */
    public function tasks()
    {
        return array_merge(parent::tasks(), [
            'create-view' => Tasks\BuildCreateView::class,
            'edit-view' => Tasks\BuildEditView::class,
        ]);
    }
}
