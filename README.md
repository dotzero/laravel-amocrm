# Laravel AmoCrm

[![Build Status](https://travis-ci.org/dotzero/laravel-amocrm.svg?branch=master)](https://travis-ci.org/dotzero/laravel-amocrm)

**Laravel AmoCrm** это сервис провайдер и фасад для **Laravel 5 Framework** реализующие клиент для работы с API amoCRM
используя библиотеку [amocrm-php](https://github.com/dotzero/amocrm-php).

## Установка

Используя [Composer](https://getcomposer.org/), в корнерой директории проекта.

```bash
$ composer require dotzero/laravel-amocrm
```

Добавить сервис провайдер в секцию `providers` файла `config/app.php`.

```php
Dotzero\LaravelAmoCrm\AmoCrmServiceProvider::class
```

Если вы хотите использовать [facade](http://laravel.com/docs/facades). То в секцию `aliases` файла `config/app.php` добавить.

```php
'AmoCrm' => Dotzero\LaravelAmoCrm\Facades\AmoCrm::class
```

## Настройка

Laravel AmoCrm требует указания параметров подключения к API amoCRM. Для начала необходимо опубликовать файл конфигурации используя:

```bash
$ php artisan vendor:publish
```

Эта команда создаст файл `config/amocrm.php` в котором можно будет указать эти параметры. Или использовать переменные окружения используя файл `.env`.

## Использование

```php
use Dotzero\LaravelAmoCrm\AmoCrmServiceManager;
use Illuminate\Support\Facades\App;

class Foo
{
    protected $amocrm;

    public function __construct(AmoCrmServiceManager $amocrm)
    {
        $this->amocrm = $amocrm;
    }

    public function bar()
    {
        $account = $this->amocrm->account;

        // Вывод информации об аккаунте
        print_r($account->apiCurrent());
    }
}

App::make('Foo')->bar();
```

## Лицензия

Библиотека доступна на условиях лицензии MIT: http://www.opensource.org/licenses/mit-license.php
