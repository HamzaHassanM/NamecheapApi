<?php

use Hamzahassanm\NamecheapApi\Enums\APIUri;

return [

    'default' => env('NAME_CHEAP_STATE', 'sandbox'),

    'sandbox' => [
        'username'  => env('NAME_CHEAP_USER_NAME', null),
        'client_ip' => env('NAME_CHEAP_CLIENT_IP', null),
        'api_key'   => env('NAME_CHEAP_APU_KEY', null),
        'api_url'   => env('NAME_CHEAP_APU_URL', APIUri::SAND_BOX->value),
    ],

    'production' => [
        'username'  => env('NAME_CHEAP_USER_NAME', null),
        'client_ip' => env('NAME_CHEAP_CLIENT_IP', null),
        'api_key'   => env('NAME_CHEAP_APU_KEY', null),
        'api_url'   => env('NAME_CHEAP_APU_URL', APIUri::PRODUCTION->value),
    ],
];
