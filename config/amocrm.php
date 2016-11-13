<?php

/*
 * This file is part of Laravel AmoCrm.
 *
 * (c) dotzero <mail@dotzero.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Авторизация в системе amoCRM
    |--------------------------------------------------------------------------
    |
    | Эти параметры необходимы для авторизации в системе amoCRM.
    | - Поддомен компании. Приставка в домене перед .amocrm.ru;
    | - Логин пользователя. В качестве логина в системе используется e-mail;
    | - Ключ пользователя, который можно получить на странице редактирования
    |   профиля пользователя.
    |
    */

    'domain' => env('AMO_DOMAIN', 'example'),
    'login' => env('AMO_LOGIN', 'login@example.com'),
    'hash' => env('AMO_HASH', 'd56b699830e77ba53855679cb1d252da'),

    /*
    |--------------------------------------------------------------------------
    | Авторизация в системе B2B Family
    |--------------------------------------------------------------------------
    |
    | Эти параметры авторизации необходимо указать если будет использована
    | отправка писем с привязкой к сделке в amoCRM, через сервис B2B Family.
    |
    */

    'b2bfamily' => [

        'appkey' => env('B2B_APPKEY'),
        'secret' => env('B2B_SECRET'),
        'email' => env('B2B_EMAIL'),
        'password' => env('B2B_PASSWORD'),

    ]

];