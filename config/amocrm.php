<?php

return [

    'domain' => env('AMO_DOMAIN', 'example'),

    'login' => env('AMO_LOGIN', 'login'),

    'hash' => env('AMO_HASH', 'd56b699830e77ba53855679cb1d252da'),

    'b2bfamily' => [

        /**
         * B2BFamily API appkey
         */
        'appkey' => null,

        /**
         * B2BFamily API secret
         */
        'secret' => null,

        /**
         * B2BFamily e-mail клиента
         */
        'email' => null,

        /**
         * B2BFamily пароль клиента
         */
        'password' => null,

    ]

];