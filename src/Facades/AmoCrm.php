<?php

/*
 * This file is part of Laravel AmoCrm.
 *
 * (c) dotzero <mail@dotzero.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dotzero\LaravelAmoCrm\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the AmoCrm facade class.
 *
 * @package Dotzero\LaravelAmoCrm\Facades
 * @author dotzero <mail@dotzero.ru>
 * @link http://www.dotzero.ru/
 * @link https://github.com/dotzero/laravel-amocrm
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
