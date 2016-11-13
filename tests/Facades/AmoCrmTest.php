<?php

/*
 * This file is part of Laravel AmoCrm.
 *
 * (c) dotzero <mail@dotzero.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dotzero\Tests\LaravelAmoCrm\Facades;

use Dotzero\LaravelAmoCrm\AmoCrmManager;
use Dotzero\LaravelAmoCrm\Facades\AmoCrm;
use Dotzero\Tests\LaravelAmoCrm\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This is the AmoCrm facade test class.
 *
 * @package Dotzero\Tests\LaravelAmoCrm\Facades
 * @author dotzero <mail@dotzero.ru>
 * @link http://www.dotzero.ru/
 * @link https://github.com/dotzero/laravel-amocrm
 */
class AmoCrmTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'amocrm';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return AmoCrm::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return AmoCrmManager::class;
    }
}