<?php

namespace Dotzero\LaravelAmoCrm\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dotzero\LaravelAmoCrm\AmoCrmServiceProvider
 */
class AmoCrm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'amocrm';
    }
}
