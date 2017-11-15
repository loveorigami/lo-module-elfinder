<?php

namespace lo\modules\elfinder\controllers;

use mihaildev\elfinder\PathController as PController;

class PathController extends PController
{
    public $disabledCommands = ['netmount'];

    public $connectOptions = [
        'bind' => [
            'mkdir.pre mkfile.pre rename.pre archive.pre' => [
                'Plugin.Normalizer.cmdPreprocess',
                'Plugin.Sanitizer.cmdPreprocess'
            ],
            'upload.presave' => [
                'Plugin.Normalizer.onUpLoadPreSave',
                'Plugin.Sanitizer.onUpLoadPreSave'
            ],
        ],
        'plugin' => [
            'Normalizer' => [
                'enable' => true,
                'nfc' => true,
                'nfkc' => true
            ],
            'Sanitizer' => [
                'enable' => true,
                'targets' => [
                    "ый", "а", "б", "в", "г", "д", "е", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т",
                    "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я", 
                    "ЫЙ", "А", "Б", "В", "Г", "Д", "Е", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т",
                    "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", "Я",
                    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                    'U', 'V', 'W', 'X', 'Y', 'Z',
                    '\\', ':', '*', '?', '"', '<', '>' ,'|', ',', " ", "/",
                ],
                'replace' => [
                    "y", "a", "b", "v", "g", "d", "e", "j", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t",
                    "u", "f", "h", "c", "ch", "sh", "sch", "", "y", "", "e", "yu", "ya",
                    "y", "a", "b", "v", "g", "d", "e", "j", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t",
                    "u", "f", "h", "c", "ch", "sh", "sch", "", "y", "", "e", "yu", "ya",
                    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                    'u', 'v', 'w', 'x', 'y', 'z',
                ]
            ]
        ],
    ];

    public function beforeAction($action)
    {
        \Yii::$app->controller->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionManager()
    {
        return $this->renderAjax('/path/manager', ['options' => $this->getManagerOptions()]);
    }
}