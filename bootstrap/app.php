<?php

use Heritage\Contracts\Debug\ExceptionHandler;
use Heritage\Foundation\Application;
use Heritage\Foundation\Exceptions\Handler;
use Ugarit\Pint\Kernel;

$basePath = dirname(__DIR__);
@mkdir($basePath.'/bootstrap/cache', 0777, true);

$app = new Application(
    $basePath
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
