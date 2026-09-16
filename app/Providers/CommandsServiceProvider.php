<?php

namespace Ugarit\Pint\Providers;

use Ugarit\Pint\Actions\ElaborateSummary;
use Ugarit\Pint\Actions\EnsurePrettierIsConfigured;
use Ugarit\Pint\Actions\FixCode;
use Ugarit\Pint\Commands\DefaultCommand;
use Heritage\Support\ServiceProvider;

class CommandsServiceProvider extends ServiceProvider
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
        $this->app->bindMethod([DefaultCommand::class, 'handle'], function ($command) {
            return $command->handle(
                resolve(FixCode::class),
                resolve(ElaborateSummary::class),
                resolve(EnsurePrettierIsConfigured::class)
            );
        });
    }
}
