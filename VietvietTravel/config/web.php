<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'homeUrl' => ['infocompany/update', 'id' => 1],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bvxUaYoegg-z-F8SNnpjtpaI1W4sMQ-D',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'duytu2005@gmail.com',
                'password' => 'Nguyenduytu',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'accessRule' => [
            'class' => 'app\components\AccessRule',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:[\w-]+>s' => '<controller>/create',
                '<controller:[\w-]+>s/update/<id:\d+>' => '<controller>/update',
                '<controller:[\w-]+>s/index' => '<controller>/index',
                '<controller:[\w-]+>s/<id:\d+>' => '<controller>/view',
                '<controller:[\w-]+>s/export' => '<controller>/export',
                '<controller:[\w-]+>s/update-status/<id:\d+>' => '<controller>/update-status',

                //'<controller:[\w-]+>s>/<action:\w+>' => '<controller>/<action>',
                '<controller:booktour>/<action:[\w-]+>' => '<controller>/<action>',
                '<controller:\w+>/<action:delete-multi-article>' => '<controller>/<action>',
                '<controller:article>/<action:[\w]+>' => '<controller>/<action>',
                '<controller:article>/<title:[\w- ]+>' => '<controller>/detail',
                '<controller:contact>/<action:\w+>' => '<controller>/<action>',
                '<controller:contact>/<id:\d+>' => '<controller>/<action>',
                '<controller:admin>/<action:\w+>' => '<controller>/<action>',
                '<controller:file-upload>/<action:\w+>/<name:[\wd._-]+>' => '<controller>/<action>',
                '<controller:\w+>/<action:recycle-bin>' => '<controller>/<action>',
                '<controller:\w+>/<action:delete-multi-tour>' => '<controller>/<action>',
                '<controller:\w+>/<action:delete-multi-hotel>' => '<controller>/<action>',
                '<controller:\w+>/<action:search>' => '<controller>/<action>',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<type:[\w-]+>' => '<controller>/show',
                '<controller:\w+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /*$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];*/

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
    $config['modules']['gridview'] = [
        'class' => '\kartik\grid\Module',
    ];
}

return $config;
