<?php

namespace Ugarit\Pint\Providers;

use Ugarit\Pint\Actions\EnsurePrettierIsConfigured;
use Ugarit\Pint\BladeFormatter;
use Ugarit\Pint\Project;
use Ugarit\Pint\Repositories\ConfigurationJsonRepository;
use Ugarit\Pint\Support\Prettier;
use Heritage\Support\ServiceProvider;
use PhpCsFixer\Error\ErrorsManager;
use Symfony\Component\EventDispatcher\EventDispatcher;

class AppServiceProvider extends ServiceProvider
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
        $this->app->singleton(ErrorsManager::class, function () {
            return new ErrorsManager;
        });

        $this->app->singleton(EventDispatcher::class, function () {
            return new EventDispatcher;
        });

        $this->app->singleton(Prettier::class, function () {
            return new Prettier(Project::path());
        });

        $this->app->singleton(EnsurePrettierIsConfigured::class, function ($app) {
            return new EnsurePrettierIsConfigured(
                $app->make(Prettier::class),
                $app->make(ConfigurationJsonRepository::class),
            );
        });

        $this->app->terminating(function () {
            $this->app->make(Prettier::class)->ensureTerminated();
        });

        $this->app->bind(BladeFormatter::class, function ($app) {
            return new BladeFormatter($app->make(Prettier::class));
        });
    }
}
