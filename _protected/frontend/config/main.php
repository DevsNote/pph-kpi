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
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        // here you can set theme used for your frontend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue'
                ],
            ],
        ],
        'view' => [
            'theme' => [
                /*
                'pathMap' => ['@app/views' => '@webroot/themes/gentelella/views'],
                'baseUrl' => '@web/themes/gentelella',
                 */
                
                'pathMap' => ['@backend/views' => '@backend/themes/adminlte/views'],
                'baseUrl' => '@web/themes/adminlte',
                 
                /*
                'pathMap' => ['@app/views' => '@app/themes/gentelella'],
                'baseUrl' => '@web/../themes/gentelella',
                 * 
                 */
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
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
    ],
    'params' => $params,
];
