<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/simplify.min.css',
    ];
    public $js = [
		'js/jquery-1.11.1.min.js',
	    'js/bootstrap.min.js',
	    'js/jquery.slimscroll.min.js',
        'js/jquery.popupoverlay.min.js',
        'js/modernizr.min.js',
        'js/simplify.js',
        'js/bootstrapValidator.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
