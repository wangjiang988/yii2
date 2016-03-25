<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'static/css/bootstrap.min.css',
        'static/css/bootstrap-responsive.min.css',
        'static/css/font-awesome.min.css',
        'static/css/style-metro.css',
        'static/css/style.css',
        'static/css/style-responsive.css',
        'static/css/default.css',
        'static/css/uniform.default.css',


    ];
    public $js = [
        'static/js/jquery-1.10.1.min.js',
        'static/js/jquery-migrate-1.2.1.min.js',
        'static/js/jquery-ui-1.10.1.custom.min.js',
        'static/js/bootstrap.min.js',
        'static/js/jquery.slimscroll.min.js',
        'static/js/jquery.blockui.min.js',
        'static/js/jquery.cookie.min.js',
        'static/js/jquery.uniform.min.js',
        'static/js/app.js',

    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
