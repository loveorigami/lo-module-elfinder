<?php

namespace lo\modules\elfinder\controllers;

class FileManagerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
