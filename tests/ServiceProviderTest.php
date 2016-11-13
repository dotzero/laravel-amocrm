<?php

/*
 * This file is part of Laravel AmoCrm.
 *
 * (c) dotzero <mail@dotzero.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dotzero\Tests\LaravelAmoCrm;

use Dotzero\LaravelAmoCrm\AmoCrmManager;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

/**
 * This is the service provider test class.
 *
 * @package Dotzero\Tests\LaravelAmoCrm
 * @author dotzero <mail@dotzero.ru>
 * @link http://www.dotzero.ru/
 * @link https://github.com/dotzero/laravel-amocrm
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testAmoCrmManagerIsInjectable()
    {
        $this->assertIsInjectable(AmoCrmManager::class);
    }
}