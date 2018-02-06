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
//        'js/plugins/loaders/pace.min.js',
        'js/core/libraries/bootstrap.min.js',
//        'js/plugins/loaders/blockui.min.js',
//        'js/plugins/visualization/d3/d3.min.js',
//        'js/plugins/visualization/d3/d3_tooltip.js',
//        'js/plugins/forms/styling/switchery.min.js',
//        'js/plugins/forms/styling/uniform.min.js',
//        'js/plugins/forms/selects/bootstrap_multiselect.js',
//        'js/plugins/ui/moment/moment.min.js',
//        'js/plugins/pickers/daterangepicker.js',
        'js/core/app.js',
//        'js/pages/dashboard.js',
//        'js/plugins/ui/ripple.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
