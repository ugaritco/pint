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
    'view' => [
        'paths' => [
            $basePath.'/resources/views',
        ],
        'compiled' => $basePath.'/bootstrap/cache',
    ],
]));

$app->instance('env', 'production');

$app->register(Heritage\Events\EventServiceProvider::class);
$app->register(Heritage\Filesystem\FilesystemServiceProvider::class);
$app->register(Heritage\View\ViewServiceProvider::class);

$app->register(Ugarit\Pint\Providers\AppServiceProvider::class);
$app->register(Ugarit\Pint\Providers\ActionsServiceProvider::class);
$app->register(Ugarit\Pint\Providers\CommandsServiceProvider::class);
$app->register(Ugarit\Pint\Providers\RepositoriesServiceProvider::class);

return $app;
