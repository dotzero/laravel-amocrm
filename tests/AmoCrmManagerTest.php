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

    /**
     * @dataProvider modelsProvider
     */
    public function testGetModel($name, $expected)
    {
        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.domain')->andReturn('example');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.login')->andReturn('login@example.com');

        $this->manager->getConfig()->shouldReceive('get')->once()
            ->with('amocrm.hash')->andReturn('d56b699830e77ba53855679cb1d252da');

        $model = $this->manager->{$name};
        $this->assertInstanceOf($expected, $model);
        $this->assertInstanceOf('\AmoCRM\Models\ModelInterface', $model);
        $this->assertSame($expected, (string)$model);
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

    public function modelsProvider()
    {
        return [
            // model name, expected
            ['account', 'AmoCRM\Models\Account'],
            ['call', 'AmoCRM\Models\Call'],
            ['catalog', 'AmoCRM\Models\Catalog'],
            ['catalog_element', 'AmoCRM\Models\CatalogElement'],
            ['company', 'AmoCRM\Models\Company'],
            ['contact', 'AmoCRM\Models\Contact'],
            ['customer', 'AmoCRM\Models\Customer'],
            ['customers_periods', 'AmoCRM\Models\CustomersPeriods'],
            ['custom_field', 'AmoCRM\Models\CustomField'],
            ['lead', 'AmoCRM\Models\Lead'],
            ['links', 'AmoCRM\Models\Links'],
            ['note', 'AmoCRM\Models\Note'],
            ['pipelines', 'AmoCRM\Models\Pipelines'],
            ['task', 'AmoCRM\Models\Task'],
            ['transaction', 'AmoCRM\Models\Transaction'],
            ['unsorted', 'AmoCRM\Models\Unsorted'],
            ['webhooks', 'AmoCRM\Models\Webhooks'],
            ['widgets', 'AmoCRM\Models\Widgets'],
        ];
    }
}
