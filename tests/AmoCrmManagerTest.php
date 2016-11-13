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

use Mockery;
use AmoCRM\Client;
use AmoCRM\Helpers\Fields;
use AmoCRM\Helpers\B2BFamily;
use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Dotzero\LaravelAmoCrm\AmoCrmManager;

/**
 * This is the Vimeo manager test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AmoCrmManagerTest extends AbstractTestBenchTestCase
{
    /**
     * @var \Dotzero\LaravelAmoCrm\AmoCrmManager
     */
    protected $manager;

    public function setUp()
    {
        $this->manager = $this->getManager();
    }

    public function testGetClient()
    {
        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.domain')->andReturn('example');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.login')->andReturn('login@example.com');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.hash')->andReturn('d56b699830e77ba53855679cb1d252da');

        $return = $this->manager->getClient();

        $this->assertInstanceOf(Client::class, $return);
    }

    public function testGetFields()
    {
        $return = $this->manager->getFields();

        $this->assertInstanceOf(Fields::class, $return);
    }

    public function testGetB2BFamily()
    {
        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.domain')->andReturn('example');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.login')->andReturn('login@example.com');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.hash')->andReturn('d56b699830e77ba53855679cb1d252da');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.b2bfamily.appkey')->andReturn('appkey');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.b2bfamily.secret')->andReturn('secret');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.b2bfamily.email')->andReturn('email');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.b2bfamily.password')->andReturn('password');

        $return = $this->manager->getB2BFamily();

        $this->assertInstanceOf(B2BFamily::class, $return);
    }

    protected function getManager()
    {
        $repository = Mockery::mock(Repository::class);
        $manager = new AmoCrmManager($repository);

        return $manager;
    }
}