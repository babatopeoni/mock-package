<?php

namespace BabatopeOni\MockPackage\Facades;

use Illuminate\Support\Facades\Facade;

class MockPackage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mockpackage';
    }
}
