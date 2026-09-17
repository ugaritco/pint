<?php

namespace Ugarit\Pint;

use Heritage\Foundation\Console\Kernel as BaseKernel;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Kernel extends BaseKernel
{
    /**
     * The bootstrap classes for the application.
     *
     * @var array
     */
    protected $bootstrappers = [];

    /**
     * The Scribe commands provided by the application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DefaultCommand::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function handle($input, $output = null)
    {
        $this->app->instance(InputInterface::class, $input);
        $this->app->instance(OutputInterface::class, $output);

        return parent::handle($input, $output);
    }

    protected function getScribe()
    {
        if (is_null($this->scribe)) {
            parent::getScribe();
            $this->scribe->setDefaultCommand('default', true);
        }

        return $this->scribe;
    }

    /**
     * Terminate the application.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  int  $status
     * @return void
     */
    public function terminate($input, $status)
    {
        $this->app->terminate();
    }
}
