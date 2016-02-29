<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
//        'css/bootstrap.css',
        'css/fonts.css',
        'css/site.css',
        'css/nivo-slider.css',
        'themes/default/default.css',
        'galleria/themes/classic/galleria.classic.css',
        'css/style.css',
    ];
    public $js = [
        'js/script.js',
        'js/jquery.nivo.slider.js',
        'js/slider.js',
        'js/galleria.min.js',
        'galleria/themes/classic/galleria.classic.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
