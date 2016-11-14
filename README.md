# Laravel AmoCrm

[![Build Status](https://travis-ci.org/dotzero/laravel-amocrm.svg?branch=master)](https://travis-ci.org/dotzero/laravel-amocrm)

**Laravel AmoCrm** это ServiceProvider и Facade для **Laravel 5** предоставляющие интеграцию с API amoCRM используя библиотеку [amocrm-php](https://github.com/dotzero/amocrm-php).

## Установка

Используя [Composer](https://getcomposer.org/), в корнерой директории проекта.

```bash
$ composer require dotzero/laravel-amocrm
```

## Настройка

После установки необходимо добавить `AmoCrmServiceProvider` в секцию `providers` файла `config/app.php`.

```php
'providers' => [
    // ...
    Dotzero\LaravelAmoCrm\AmoCrmServiceProvider::class,
],
```

Для использования [Facade](http://laravel.com/docs/facades),  необходимо добавить `AmoCrm` в секцию `aliases` файла `config/app.php`.

```php
'aliases' => [
    // ...
    'AmoCrm' => Dotzero\LaravelAmoCrm\Facades\AmoCrm::class,
],
```

Laravel AmoCrm требует указания параметров подключения к API amoCRM. Указать их можно в файле конфигурации. Для этого необходимо опубликовать файл конфигурации.

```bash
$ php artisan vendor:publish
```

Эта команда создаст файл `config/amocrm.php` в котором можно будет указать эти параметры. Кроме того можно использовать переменные окружения используя файл `.env`.

## Использование

```php
use Dotzero\LaravelAmoCrm\AmoCrmManager;

Route::get('/', function (AmoCrmManager $amocrm) {
    try {

        /** @var \AmoCRM\Client $client */
        $client = $amocrm->getClient();
        $account = $client->account;

        // или

        /** @var \AmoCRM\Models\Account $account */
        $account = $amocrm->account;

        dd($account->apiCurrent());

    } catch (\Exception $e) {
        abort(400, $e->getMessage());
    }
});
```

Если вы предопочитаете использовать Facade, то следующий пример показывает как это можно сделать.

```php
use Dotzero\LaravelAmoCrm\Facades\AmoCrm;

Route::get('/', function () {

    /** @var \AmoCRM\Client $client */
    $client = AmoCrm::getClient();

    /** @var \AmoCRM\Helpers\Fields $fields */
    $fields = AmoCrm::getFields();

    /** @var \AmoCRM\Helpers\getB2BFamily $fields */
    $b2bfamily = AmoCrm::getB2BFamily();

});
```

## Документация

Смотреть документацию к библиотеке [amocrm-php](https://github.com/dotzero/amocrm-php).

## Лицензия

Библиотека доступна на условиях лицензии MIT: http://www.opensource.org/licenses/mit-license.php
