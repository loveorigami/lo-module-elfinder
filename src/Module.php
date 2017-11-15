<?php

namespace lo\modules\elfinder;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'lo\modules\elfinder\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
		// initialize the module with the configuration loaded from config.php
        //\Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}
