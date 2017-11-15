<?php

namespace lo\modules\elfinder\widgets;


use yii\base\Widget;

class ElfinderFileInput extends Widget
{
    public $url;

    public function run()
    {
        $this->getView()->registerJS(
            "$('#elfinderFileInput').hide().change(function(){
                $.post('{$this->url}&filename='+$(this).val());
                location.reload();
            })
            "
        );
        return \mihaildev\elfinder\InputFile::widget(
            [
                'controller' => '/elfinder/dropzone',
                'filter' => 'image',
                'name' => 'elfinderFileInput',
                'value' => '',
                'options' => ['id' => 'elfinderFileInput'],
                'buttonOptions' => ['class' => ['pull-right', 'btn', 'btn-success']],
                'buttonTag' => 'span',
                'buttonName'=>'<i class="fa fa-plus"></i> '.\Yii::t('app', 'Open gallery'),
            ]
        );
    }
}