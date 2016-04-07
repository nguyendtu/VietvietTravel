<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-1',
                //'input' => 'col-sm-8'
                'offset' => 'col-sm-offset-1',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->all(), 'id', 'name'), ['prompt' => '-- Choose a tourtype --']
    ) ?>

    <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')])?>

    <?= $form->field($model, 'editdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')])?>

    <?= $form->field($model, 'hot')->checkbox() ?>

    <?= $form->field($model, 'img', ['options' => ['name' => 'simg', 'class' => 'form-group']])->label('Smallimg')->widget(FileInput::classname(), [
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
               // var fileName = data.files[index].name.replace(" (Copy)", "1").replace(" ", "_");
                var fileName = data.response.files.name;

                $("#article-smallimg").val(fileName);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);

                $("#article-smallimg").val("");
            }',
        ]
    ]) ?>

    <?= $form->field($model, 'smallimg', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'id_user', ['options' => ['class' => 'sr-only']])->textInput(['value' => Yii::$app->user->identity->id]) ?>

    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'DeActive',
    ]) ?>

    <div class="form-group">
        <label for="" class="label-control col-sm-1"></label>
        <div class="col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
    if('$model->smallimg' != ""){
    var img =  "<div class='file-preview-frame' id='$model->smallimg' data-fileindex='0'>" +
                    "<img src='/images/$model->smallimg' class='file-preview-image' title='$model->smallimg' alt='$model->smallimg' style='width:auto;height:160px;'>" +
                    "<div class='file-thumbnail-footer'>" +
                    "<div class='file-footer-caption' title='$model->smallimg'>$model->smallimg</div>" +
                        "<div class='file-actions'>" +
                            "<div class='file-footer-buttons'>" +
                                "<button type='button' class='kv-file-upload btn btn-xs btn-default' title='Upload file'>   <i class='glyphicon glyphicon-upload text-info'></i></button>" +
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='smallimg'></i></button>" +
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