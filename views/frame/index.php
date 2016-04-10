<?php
use \yii\helpers\Json;
use \yii\helpers\Url;
\yii\web\JqueryAsset::register($this);
\mihaildev\elfinder\Assets::register($this);
\mihaildev\elfinder\Assets::noConflict($this);

$url = Json::encode(Url::to(['/elfinder/path/connect']));
$this->registerJs(
<<<JS
    var FileBrowserDialogue = {
        init: function() {
            // Here goes your code for setting your custom things onLoad.
        },
        mySubmit: function (URL) {
            // pass selected file path to TinyMCE
            parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

            // close popup window
            parent.tinymce.activeEditor.windowManager.close();
        }
    };

    $().ready(function() {
        var elf = $('#elfinder').elfinder({
            // set your elFinder options here
            url: $url,  // connector URL
            getFileCallback: function(file) { // editor callback
                // file.url - commandsOptions.getfile.onlyURL = false (default)
                // file     - commandsOptions.getfile.onlyURL = true
                FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE
            }
        }).elfinder('instance');
    });
JS
    , \yii\web\View::POS_READY);
?>
<div id="elfinder"></div>
