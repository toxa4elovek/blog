<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@img' => '@frontend/web/img/category',
        '@web_img' => '/img/content',
    ],
    'language' => 'ru-Ru',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*'memCache' => [
            'class' => 'yii\caching\MemCache',
        ],*/
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        /*'formatter' => [
            'locale' => 'ru-Ru'
        ]*/
    ],
    'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'admins' => ['toxa4elovek', 'garry-krut']
        ],
    ],
];
