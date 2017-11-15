<?php

namespace lo\modules\elfinder\controllers;

use yii\web\Controller;

class FrameController extends Controller
{
    public function actionIndex()
    {
        return $this->renderAjax('index');
    }
}