<?php

namespace Bpocallaghan\Impersonate\Facades;

use Illuminate\Support\Facades\Facade;

class Impersonate extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'impersonate';
    }
}