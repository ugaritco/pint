<?php

use Heritage\Contracts\Debug\ExceptionHandler;
use Heritage\Foundation\Application;
use Heritage\Foundation\Exceptions\Handler;
use Ugarit\Pint\Kernel;

$app = new Application(
    dirname(__DIR__)
);

$app->singleton(
    Heritage\Contracts\Console\Kernel::class,
    Kernel::class
);

$app->singleton(
    ExceptionHandler::class,
    Handler::class
);

$app->register(Ugarit\Pint\Providers\AppServiceProvider::class);

return $app;
