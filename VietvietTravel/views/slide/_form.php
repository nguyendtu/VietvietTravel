<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Slide */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slide-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'simg', ['options' => ['name' => 'simg']])->label('Image')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'name' => 'smallimg',
        ],
        'pluginOptions' => [
            'uploadUrl' => \yii\helpers\Url::to(['/file-upload/upload']),
            'maxFileCount' => 1,
            'autoReplace' => true,
        ],
        'pluginEvents' => [
            'fileuploaded' => 'function(event, data, previewId, index){
                //var fileName = data.files[index].name.replace(" (Copy)", "1").replace(" ", "_");
                var fileName = data.response.files.name;

                $("#slide-image").val(fileName);
                $("#slide-link").val("images/" + fileName);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);

                $("#slide-image").val("");
                $("#slide-link").val("");
            }',
        ]
    ]) ?>

    <?= $form->field($model, 'image')->label("")->textInput(['maxlength' => true, 'class' => 'sr-only']) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->dropDownList([
        '1' => 'Slide large',
        '2' => 'Slide small 1',
        '3' => 'Slide small 2',
    ], ['prompt' => '---Choose position---']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
    if('$model->image' != ""){
    var img =  "<div class='file-preview-frame' id='$model->image' data-fileindex='0'>" +
                    "<img src='/images/$model->image' class='file-preview-image' title='$model->image' alt='$model->image' style='width:auto;height:160px;'>" +
                    "<div class='file-thumbnail-footer'>" +
                    "<div class='file-footer-caption' title='$model->image'>$model->image</div>" +
                        "<div class='file-actions'>" +
                            "<div class='file-footer-buttons'>" +
                                "<button type='button' class='kv-file-upload btn btn-xs btn-default' title='Upload file'>   <i class='glyphicon glyphicon-upload text-info'></i></button>" +
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='slide-image'  data-input='smallimg'></i></button>" +
                            "</div>" +
                            "<div class='file-upload-indicator' title='Not uploaded yet'><i class='glyphicon glyphicon-hand-down text-warning'></i></div>" +
                            "<div class='clearfix'></div>" +
                        "</div>" +
                    "</div>" +
                "</div>";
        $(".file-preview-thumbnails").append(img);
        $('.file-drop-zone-title').toggleClass("hide");
    }
JS;
$this->registerJs($js);
?>