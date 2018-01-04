<?php

namespace Viviniko\Bookshelf;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Viviniko\Bookshelf\Console\Commands\BookshelfTableCommand;

class BookshelfServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/bookshelf.php' => config_path('bookshelf.php'),
        ]);

        // Register commands
        $this->commands('command.bookshelf.table');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/bookshelf.php', 'bookshelf');

        $this->registerRepositories();

        $this->registerBookshelfService();

        $this->registerCommands();
    }

    protected function registerRepositories()
    {
        $this->app->singleton(
            \Viviniko\Bookshelf\Repositories\Bookshelf\BookshelfRepository::class,
            \Viviniko\Bookshelf\Repositories\Bookshelf\EloquentBookshelf::class
        );
    }

    protected function registerBookshelfService()
    {
        $this->app->singleton(
            \Viviniko\Bookshelf\Contracts\BookshelfService::class,
            \Viviniko\Bookshelf\Services\BookshelfServiceImpl::class
        );
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->app->singleton('command.bookshelf.table', function ($app) {
            return new BookshelfTableCommand($app['files'], $app['composer']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \Viviniko\Bookshelf\Repositories\Bookshelf\BookshelfRepository::class,
            \Viviniko\Bookshelf\Contracts\BookshelfService::class
        ];
    }
}