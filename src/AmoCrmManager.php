<?php

/*
 * This file is part of Laravel AmoCrm.
 *
 * (c) dotzero <mail@dotzero.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dotzero\LaravelAmoCrm;

use AmoCRM\Client;
use AmoCRM\Helpers\Fields;
use AmoCRM\Helpers\B2BFamily;
use Illuminate\Contracts\Config\Repository;

/**
 * This is the AmoCrm manager class.
 *
 * @package Dotzero\LaravelAmoCrm
 * @author dotzero <mail@dotzero.ru>
 * @link http://www.dotzero.ru/
 * @link https://github.com/dotzero/laravel-amocrm
 * @property \AmoCRM\Models\Account $account
 * @property \AmoCRM\Models\Call $call
 * @property \AmoCRM\Models\Catalog $catalog
 * @property \AmoCRM\Models\CatalogElement $catalog_element
 * @property \AmoCRM\Models\Company $company
 * @property \AmoCRM\Models\Contact $contact
 * @property \AmoCRM\Models\Customer $customer
 * @property \AmoCRM\Models\CustomersPeriods $customers_periods
 * @property \AmoCRM\Models\CustomField $custom_field
 * @property \AmoCRM\Models\Lead $lead
 * @property \AmoCRM\Models\Links $links
 * @property \AmoCRM\Models\Note $note
 * @property \AmoCRM\Models\Pipelines $pipelines
 * @property \AmoCRM\Models\Task $task
 * @property \AmoCRM\Models\Transaction $transaction
 * @property \AmoCRM\Models\Unsorted $unsorted
 * @property \AmoCRM\Models\WebHooks $webhooks
 * @property \AmoCRM\Models\Widgets $widgets
 */
class AmoCrmManager
{
    /**
     * The config instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The AmoCRM client instance.
     *
     * @var \AmoCRM\Client
     */
    protected $client;

    /**
     * Create a new manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Get the config instance.
     *
     * @return \Illuminate\Contracts\Config\Repository
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get the AmoCRM client instance.
     *
     * @return \AmoCRM\Client
     */
    public function getClient()
    {
        if (!$this->client instanceof Client) {
            $this->client = new Client(
                $this->config->get('amocrm.domain'),
                $this->config->get('amocrm.login'),
                $this->config->get('amocrm.hash')
            );
        }

        return $this->client;
    }

    /**
     * Get the AmoCRM Fields helper instance.
     *
     * @return \AmoCRM\Helpers\Fields
     */
    public function getFields()
    {
        return new Fields();
    }

    /**
     * Get the AmoCRM B2BFamily helper instance.
     *
     * @return \AmoCRM\Helpers\B2BFamily
     */
    public function getB2BFamily()
    {
        $client = $this->getClient();

        return new B2BFamily($client,
            $this->config->get('amocrm.b2bfamily.appkey'),
            $this->config->get('amocrm.b2bfamily.secret'),
            $this->config->get('amocrm.b2bfamily.email'),
            $this->config->get('amocrm.b2bfamily.password')
        );
    }

    /**
     * Dynamically pass methods to AmoCRM client instance.
     *
     * @param string $property
     * @return \AmoCRM\Models\ModelInterface
     */
    public function __get($property)
    {
        return call_user_func_array([$this->getClient(), '__get'], [$property]);
    }
}
