<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
return [

    'db' => [
        'dsn' => 'mysql:dbname=portal.dev;host=127.0.0.1',
        'username' => 'root',
        'password' => 'root',
    ],

    \MSBios\Theme\Module::class => [
        // 'default_global_paths' => [
        //     'default_global_paths' => __DIR__ . '/../../themes/'
        // ]
    ]
];
