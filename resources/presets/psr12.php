<?php

use Ugarit\Pint\Factories\ConfigurationFactory;

return ConfigurationFactory::preset([
    '@PSR12' => true,
    'no_unused_imports' => true,
]);
