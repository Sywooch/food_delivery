<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '/backend/web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'css/icons/icomoon/styles.css',
        'css/core.css',
        'css/components.css',
        'css/colors.css'
    ];
    public $js = [
        'js/core/libraries/bootstrap.min.js',
        'js/plugins/forms/selects/select2.min.js',
        'js/plugins/forms/styling/uniform.min.js',
        'js/core/app.js',
        'js/pages/form_layouts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
