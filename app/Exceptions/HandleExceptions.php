<?php

namespace App\Exceptions;

class HandleExceptions extends \Heritage\Foundation\Bootstrap\HandleExceptions
{
    /**
     * {@inheritdoc}
     */
    protected function shouldIgnoreDeprecationErrors()
    {
        return true;
    }
}
