<?php

namespace App\Admin;

return [
    'version' => 5,
    'namespace' => __NAMESPACE__,
    'directories' => [
        'classes',
    ],
    'files' => [
        'helpers.php',
    ],
    'paths' => [
        'config' => 'config',
        'assets' => 'resources/assets',
        'lang' => 'resources/lang',
        'views' => 'resources/views',
    ],
    'providers' => [
        Providers\AddonServiceProvider::class,
        Providers\RouteServiceProvider::class,
    ],
    'commands' => [
    ],
    'middleware' => [
    ],
    'routes' => [
        'domain' => env('APP_ADDON_DOMAIN'),
        'prefix' => env('APP_ADDON_PATH', 'admin'),
        'namespace' => __NAMESPACE__.'\Http\Controllers',
        'middleware' => [
            'web',
        ],
        'files' => [
            'routes/web.php',
        ],
    ],
    'aliases' => [
    ],
    'includes_global_aliases' => true,
    'http' => [
        'middlewares' => [
        ],
        'route_middlewares' => [
        ],
    ],
];
