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

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

/**
 * This is the AmoCrm service provider class.
 *
 * @package Dotzero\LaravelAmoCrm
 * @author dotzero <mail@dotzero.ru>
 * @link http://www.dotzero.ru/
 * @link https://github.com/dotzero/laravel-amocrm
 */
class AmoCrmServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../config/amocrm.php');

        $this->publishes([
            $config => config_path('amocrm.php'),
        ], 'config');

        $this->mergeConfigFrom($config, 'amocrm');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('amocrm', function (Container $app) {
            $config = $app['config'];
            return new AmoCrmManager($config);
        });

        $this->app->singleton('amocrm.fields', function (Container $app) {
            $manager = $app['amocrm'];

            return $manager->getFields();
        });

        $this->app->singleton('amocrm.b2bfamily', function (Container $app) {
            $manager = $app['amocrm'];

            return $manager->getB2BFamily();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'amocrm',
            'amocrm.fields',
            'amocrm.b2bfamily',
        ];
    }
}