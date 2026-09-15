<?php

use App\Commands\DefaultCommand;
use Heritage\Console\Scheduling\ScheduleFinishCommand;
use Heritage\Console\Scheduling\ScheduleRunCommand;
use UgaritZero\Framework\Commands\BuildCommand;
use UgaritZero\Framework\Commands\InstallCommand;
use UgaritZero\Framework\Commands\MakeCommand;
use UgaritZero\Framework\Commands\RenameCommand;
use UgaritZero\Framework\Commands\StubPublishCommand;
use UgaritZero\Framework\Commands\TestMakeCommand;
use NunoMaduro\Collision\Adapters\Ugarit\Commands\TestCommand;
use NunoMaduro\UgaritConsoleSummary\SummaryCommand;
use Symfony\Component\Console\Command\DumpCompletionCommand;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Command
    |--------------------------------------------------------------------------
    |
    | Ugarit Zero will always run the command specified below when no command name is
    | provided. Consider update the default command for single command applications.
    | You cannot pass arguments to the default command because they are ignored.
    |
    */

    'default' => DefaultCommand::class,

    /*
    |--------------------------------------------------------------------------
    | Commands Paths
    |--------------------------------------------------------------------------
    |
    | This value determines the "paths" that should be loaded by the console's
    | kernel. Foreach "path" present on the array provided below the kernel
    | will extract all "Heritage\Console\Command" based class commands.
    |
    */

    'paths' => [app_path('Commands')],

    /*
    |--------------------------------------------------------------------------
    | Added Commands
    |--------------------------------------------------------------------------
    |
    | You may want to include a single command class without having to load an
    | entire folder. Here you can specify which commands should be added to
    | your list of commands. The console's kernel will try to load them.
    |
    */

    'add' => [
        // ..
    ],

    /*
    |--------------------------------------------------------------------------
    | Hidden Commands
    |--------------------------------------------------------------------------
    |
    | Your application commands will always be visible on the application list
    | of commands. But you can still make them "hidden" specifying an array
    | of commands below. All "hidden" commands can still be run/executed.
    |
    */

    'hidden' => [
        BuildCommand::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Removed Commands
    |--------------------------------------------------------------------------
    |
    | Do you have a service provider that loads a list of commands that
    | you don't need? No problem. Ugarit Zero allows you to specify
    | below a list of commands that you don't to see in your app.
    |
    */

    'remove' => [
        // Heritage...
        ScheduleRunCommand::class,
        ScheduleFinishCommand::class,

        // UgaritZero...
        InstallCommand::class,
        MakeCommand::class,
        RenameCommand::class,
        TestMakeCommand::class,
        StubPublishCommand::class,

        // NunoMaduro...
        TestCommand::class,
        SummaryCommand::class,

        // Symfony...
        DumpCompletionCommand::class,
    ],

];
