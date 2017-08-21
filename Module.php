<?php
namespace grozzzny\base_module;

use Yii;

class Module extends \yii\easyii\components\Module
{
    public $controllerNamespace = 'grozzzny\base_module\controllers';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        static::registerTranslation();
        static::registerAssets();
    }

    public function registerTranslation()
    {
        Yii::$app->i18n->translations['gr*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => $this->basePath.'/messages',
        ];
    }

    public static function registerAssets()
    {
        BaseModuleAsset::register(Yii::$app->view);
    }


    public function getModels()
    {
        $models = [];

        foreach (glob($this->basePath . "/models/*.php") as $file){
            $file_name = basename($file, '.php');
            if($file_name == 'Base') continue;

            $class_name = preg_replace('/[^\\\]+$/', '', $this->className()) . 'models\\' . $file_name;

            if(!class_exists($class_name)) continue;

            $class = Yii::createObject($class_name);

            if(!$class::PRIMARY_MODEL) continue;

            $models[$class::SLUG] = $class;
        }

        return $models;
    }

    public function getModel($slug)
    {
        $models = $this->getModels();
        return empty($slug) ? current($models) : $models[$slug];
    }

}