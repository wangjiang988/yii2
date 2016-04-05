<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
    ],
//    'catchAll' => [   //重定向所有请求到网址
//        'site/notice',
//        'isoff' => '1',
//        'who' => 'wj',
//    ],

    'controllerNamespace' => 'frontend\controllers',
//    'controllerMap' => [   //控制器的重新定义 ,没有用
//        [
//            'bsite' => 'backend\controllers\SiteController',
//            'sites' => [
//                'class' => 'frontend\controllers\SiteController',
//                'enableCsrfValidation' => false,
//            ],
//        ],
//    ],
//    'defaultRoute' => 'test', //设置默认路由
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
//        'urlManager' => [
//            'enablePrettyUrl' => true,
////            'enableStrictParsing' => true,
//            'showScriptName' => false,
//            'rules' => [
//                [
////                    'class' => 'yii\rest\UrlRule',
////                    'controller' => 'user'
//                ],
//            ],
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
