<?php

namespace lo\modules\elfinder\controllers;

use yii\helpers\ArrayHelper;

class DropzoneController extends PathController
{
    public $roots = [
        [
            'baseUrl' => '@web',
            'basePath' => '@webroot/files/',
            'path' => '',
            'name' => 'Global',
        ],
    ];
    public $connectOptions = [];


    /**
     * @param  string $cmd command name
     * @param  array $result command result
     * @param  array $args command arguments from client
     * @param  elFinder $elfinder elFinder instance
     * @return void|true
     **/

    public function restoreImageInDB($cmd, $result, $args, $elfinder)
    {
        $filepath = \Yii::getAlias(\Yii::$app->getModule('image')->fsComponent->path) . "/";
        foreach (ArrayHelper::getValue($result, 'removed', []) as $key => $file) {
            $images = Image::findAll(['filename' => str_replace($filepath, '', $file['realpath'])]);
            $added = ArrayHelper::getValue($result, "added.$key", []);
            if (empty($added) === false) {
                foreach ($images as $image) {
                    $image->filename = str_replace($filepath, '', $elfinder->realpath($added['hash']));
                    $image->save();
                }
            } else {
                foreach ($images as $image) {
                    $image->delete();
                }
            }
        }
    }

    public function beforeAction($action)
    {
        $this->connectOptions = ArrayHelper::merge(
            ArrayHelper::getValue(
                get_parent_class($this),
                'connectOptions',
                [
                    'bind' => [
                        'rename rm paste' => [$this, 'restoreImageInDB'],
                    ],
                ]
            ),
            []
        );


        return parent::beforeAction($action);
    }
}