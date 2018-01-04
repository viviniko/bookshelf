<?php

namespace Viviniko\Bookshelf\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class BookshelfTableCommand extends CreateMigrationCommand
{
    /**
     * @var string
     */
    protected $name = 'bookshelf:table';

    /**
     * @var string
     */
    protected $description = 'Create a migration for the bookshelf service table';

    /**
     * @var string
     */
    protected $stub = __DIR__.'/stubs/bookshelf.stub';

    /**
     * @var string
     */
    protected $migration = 'create_bookshelf_table';
}