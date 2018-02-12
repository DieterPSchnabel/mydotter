<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Routes group config
    |--------------------------------------------------------------------------
    |
    | The default group settings for the translations routes.
    |
    */

    /*'route' => [
        'prefix'     => 'admin/dashboard/config',
        'middleware' => [
            'web',
            'auth',
            'role:Administrator',
        ],
    ],*/


    'route' => [
        'prefix'     => 'admin/dashboard/config',
        'middleware' => [
            'web',
            'auth',
        ],
    ],
];
