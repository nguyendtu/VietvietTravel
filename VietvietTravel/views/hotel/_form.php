<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

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
    <div class="row">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_location')->dropDownList(
            \yii\helpers\ArrayHelper::map($location->find()->all(), 'id', 'name'), ['prompt' => '-- Choose Location --']) ?>

        <div class="form-group" id="pr-c">
            <label for="" class="label-control col-md-1"></label>
            <div class="col-md-10">
                <input id="price-contact" type="radio" name="price-type" value="price-contact"> <label for="price-contact">Price Contact</label><br/>
                <input id="price" type="radio" name="price-type" value="price" checked> <label for="price">Price</label>
            </div>
        </div>

        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'editdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>

        <?= $form->field($model, 'star')->dropDownList([
            '1' => '1 Star',
            '2' => '2 Star',
            '3' => '3 Star',
            '4' => '4 Star',
            '5' => '5 Star',
        ], ['prompt' => '-- Choose star']) ?>

        <?= $form->field($model, 'hot')->checkbox() ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>

        <?= $form->field($model, 'status')->dropDownList([
            '1' => 'Active',
            '0' => 'DeActive',
        ]) ?>

        <?= $form->field($model, 'phone')->textInput([
            'placeholder' => \app\models\Infocompany::find()->where(['id' => 1])->one()->mobile,
            'value' => \app\models\Infocompany::find()->where(['id' => 1])->one()->mobile
        ]) ?>

        <?= $form->field($model, 'simg', ['options' => ['name' => 'simg', 'class' => 'form-group']])->label('Smallimg')->widget(FileInput::classname(), [
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
                var fileName = data.files[index].name.replace(" ", "_");

                $("#hotel-smallimg").val(fileName);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);

                $("#hotel-smallimg").val("");
            }',
            ]
        ]) ?>

        <?= $form->field($model, 'smallimg', ['options' => ['class' => 'sr-only']])->textInput() ?>

        <?= $form->field($model, 'limg', ['options' => ['name' => 'limg', 'class' => 'form-group']])->label('Largeimg')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
                'name' => 'smallimg',
            ],
            'pluginOptions' => [
                'uploadUrl' => \yii\helpers\Url::to(['/file-upload/upload']),
                'maxFileCount' => 10,
            ],
            'pluginEvents' => [
                'fileuploaded' => 'function(event, data, previewId, index){
                    var lag = $("#hotel-largeimg").val().split(" "),
                        //fileName = data.files[index].name.replace(" (Copy)", "1").replace(" ", "_");
                        fileName = data.response.files.name;

                    for(var i = 0; i < lag.length; i++){
                        if(lag[i] === ""){
                            lag.splice(i, 1);
                        }
                    }

                    lag.push(fileName);
                    $("#hotel-largeimg").val(lag.join(" "));
                }',
                'filesuccessremove' => 'function(event, id){
                    var name = $("#" + id + " img").attr("title"),
                        fileName = name.replace(" ", "_");

                    $.post("/file-upload/delete/" + fileName);
                    var arr = $("#hotel-largeimg").val().split(" ");
                    for(var i = 0; i< arr.length; i++){
                        if(arr[i] === fileName){
                            arr.splice(i, 1);
                        }
                    }

                    $("#hotel-largeimg").val(arr.join(" "));
                }',
            ]
        ]) ?>

        <?= $form->field($model, 'largeimg', ['options' => ['class' => 'sr-only']])->textInput() ?>

        <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

        <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <label for="" class="label-control col-sm-1"></label>
        <div class="col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['id' => 'hotel-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='hotel-smallimg'></i></button>" +
                            "</div>" +
                            "<div class='file-upload-indicator' title='Not uploaded yet'><i class='glyphicon glyphicon-hand-down text-warning'></i></div>" +
                            "<div class='clearfix'></div>" +
                        "</div>" +
                    "</div>" +
                "</div>";
        $(".field-hotel-simg").find(".file-preview-thumbnails").append(img);
        $(".field-hotel-simg").find('.file-drop-zone-title').toggleClass("hide");
    }

    if('$model->largeimg' != ''){
        var lag = '$model->largeimg'.split(" ");
        for(var i = 0; i < lag.length; i++){
            var img =  "<div class='file-preview-frame' id='" + lag[i] + "' data-fileindex='0'>" +
                    "<img src='/images/" + lag[i] + "' class='file-preview-image' title='" + lag[i] + "' alt='" + lag[i] + "' style='width:auto;height:160px;'>" +
                    "<div class='file-thumbnail-footer'>" +
                    "<div class='file-footer-caption' title='" + lag[i] + "'>" + lag[i] + "</div>" +
                        "<div class='file-actions'>" +
                            "<div class='file-footer-buttons'>" +
                                "<button type='button' class='kv-file-upload btn btn-xs btn-default' title='Upload file'>   <i class='glyphicon glyphicon-upload text-info'></i></button>" +
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='hotel-largeimg'></i></button>" +
                            "</div>" +
                            "<div class='file-upload-indicator' title='Not uploaded yet'><i class='glyphicon glyphicon-hand-down text-warning'></i></div>" +
                            "<div class='clearfix'></div>" +
                        "</div>" +
                    "</div>" +
                "</div>";

            $(".field-hotel-limg").find(".file-preview-thumbnails").append(img);
        }
        $(".field-hotel-limg").find('.file-drop-zone-title').toggleClass("hide");
    }

    $("#w0").on("blur", "#infocompany-video", function(e){
        var value = e.target.value.replace("watch?", "").replace("=", "/");
        e.target.value = value;
        $("#video").attr("src", value);
    });
JS;
$this->registerJs($js);
?>
