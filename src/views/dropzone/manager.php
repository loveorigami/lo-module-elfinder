<?php
/**
 * @var \yii\web\View $this
 * @var array $options
 */
use yii\web\View;

$this->registerJs(
    "
    var elfinder = $('#elfinder').elfinder('instance');
    elfinder.bind('select', function(event) { console.log(event); });
    elfinder.bind('remove', function(event,e) { console.log(event); console.log(e); });
",
    View::POS_LOAD
);
include __DIR__ . '/../path/manager.php';
