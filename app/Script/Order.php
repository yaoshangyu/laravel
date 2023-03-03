<?php

namespace App\Script;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DummyTarget
 */
class Order extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DummyTarget';
    }
}
