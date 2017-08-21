<?php
namespace grozzzny\base_module;

class BaseModuleAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@grozzzny/base_module';

    public $js = [
        'admin_module.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
