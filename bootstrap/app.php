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

$app->instance('config', new Heritage\Config\Repository([
    'app' => [
        'name' => 'Pint',
        'timezone' => 'UTC',
    ],
]));

$app->register(Ugarit\Pint\Providers\AppServiceProvider::class);

return $app;
