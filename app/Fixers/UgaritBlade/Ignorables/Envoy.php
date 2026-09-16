<?php

namespace Ugarit\Pint\Fixers\UgaritBlade\Ignorables;

class Envoy
{
    /**
     * Whether the given file content should be ignored.
     */
    public function __invoke(string $path): bool
    {
        return in_array(basename($path), [
            'envoy.blade.php',
            'Envoy.blade.php',
        ]);
    }
}
