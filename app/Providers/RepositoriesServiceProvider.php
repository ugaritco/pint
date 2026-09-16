<?php

namespace Ugarit\Pint\Providers;

use Ugarit\Pint\Contracts\PathsRepository;
use Ugarit\Pint\Project;
use Ugarit\Pint\Repositories\ConfigurationJsonRepository;
use Ugarit\Pint\Repositories\GitPathsRepository;
use Heritage\Support\ServiceProvider;
use Symfony\Component\Console\Input\InputInterface;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ConfigurationJsonRepository::class, function () {
            $input = resolve(InputInterface::class);
            $config = $input->getOption('config') ?: Project::path().'/pint.json';

            return new ConfigurationJsonRepository(
                $input->getOption('no-config') ? null : $config,
                $input->getOption('preset'),
            );
        });

        $this->app->singleton(PathsRepository::class, function () {
            return new GitPathsRepository(
                Project::path(),
            );
        });
    }
}
