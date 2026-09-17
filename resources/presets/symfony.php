<?php

use Ugarit\Pint\Factories\ConfigurationFactory;

return ConfigurationFactory::preset([
    '@Symfony' => true,
    'no_unused_imports' => true,
]);
