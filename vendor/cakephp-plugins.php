<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'BasicSeed' => $baseDir . '/vendor/loadsys/cakephp-basic-seed/',
        'CakeDC/Users' => $baseDir . '/vendor/cakedc/users/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Proffer' => $baseDir . '/vendor/davidyell/proffer/',
        'Siezi/SimpleCaptcha' => $baseDir . '/vendor/siezi/cakephp-simple-captcha/'
    ]
];
