<?php

use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-1',
                //'input' => 'col-sm-8'
                //'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tourtype')->dropDownList(
        \yii\helpers\ArrayHelper::map($tourtype->find()->all(), 'id', 'name'), ['prompt' => '-- Choose a tourtype --']
    ) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'startfrom')->textInput() ?>

    <div class="form-group" id="pr-c">
        <label for="" class="label-control col-md-1"></label>
        <div class="col-md-10">
            <input id="price-contact" type="radio" name="price-type" value="price-contact"> <label for="price-contact">Price Contact</label><br/>
            <input id="price-detail" type="radio" name="price-type" value="price-detail"> <label for="price-detail">Price Detail</label><br/>
            <input id="price" type="radio" name="price-type" value="price" checked> <label for="price">Price</label>
        </div>
    </div>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>
    <?= $form->field($model, 'editdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'hot')->dropDownList([
        '0' => 'No',
        '1' => 'Top Position',
        '2' => 'Bottom Position',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'DeActive',
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
                $("#tour-smallimg").val(data.response.files.name);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);
                var arr = $("#tour-smallimg").val().split(" ");
                for(var i = 0; i < arr.length; i++){
                    if(arr[i] === fileName){
                        arr.splice(i, 1);
                    }
                }

                $("#tour-smallimg").val("");
            }',
        ]
    ]) ?>

    <?= $form->field($model, 'smallimg')->label("")->textInput(['maxlength' => true, 'class' => 'sr-only']) ?>

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
                var lag = $("#tour-largeimg").val().split(" "),
                    //fileName = data.files[index].name.replace(" (Copy)", "1").replace(" ", "_");
                    fileName = data.response.files.name;

                for(var i = 0; i < lag.length; i++){
                    if(lag[i] === ""){
                        lag.splice(i, 1);
                    }
                }

                lag.push(fileName);
                $("#tour-largeimg").val(lag.join(" "));
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);
                var arr = $("#tour-largeimg").val().split(" ");
                for(var i = 0; i< arr.length; i++){
                    if(arr[i] === fileName){
                        arr.splice(i, 1);
                    }
                }

                $("#tour-largeimg").val(arr.join(" "));
            }',
        ]
    ]) ?>

    <?= $form->field($model, 'largeimg')->label("")->textInput(['maxlength' => true, 'class' => 'sr-only']) ?>

    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label for="" class="label-control col-sm-1"></label>
        <div class="col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['id' => 'tour-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='tour-smallimg'></i></button>" +
                            "</div>" +
                            "<div class='file-upload-indicator' title='Not uploaded yet'><i class='glyphicon glyphicon-hand-down text-warning'></i></div>" +
                            "<div class='clearfix'></div>" +
                        "</div>" +
                    "</div>" +
                "</div>";
        $(".field-tour-simg").find(".file-preview-thumbnails").append(img);
        $(".field-tour-simg").find('.file-drop-zone-title').toggleClass("hide");
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
                                "<button type='button' id='btn-remove-file' class='kv-file-remove btn btn-xs btn-default' title='Remove file'><i class='glyphicon glyphicon-trash text-danger' data-input='tour-largeimg'></i></button>" +
                            "</div>" +
                            "<div class='file-upload-indicator' title='Not uploaded yet'><i class='glyphicon glyphicon-hand-down text-warning'></i></div>" +
                            "<div class='clearfix'></div>" +
                        "</div>" +
                    "</div>" +
                "</div>";

            $(".field-tour-limg").find(".file-preview-thumbnails").append(img);
        }
        $(".field-tour-limg").find('.file-drop-zone-title').toggleClass("hide");
    }

    $("#w0").on("blur", "#infocompany-video", function(e){
        var value = e.target.value.replace("watch?", "").replace("=", "/");
        e.target.value = value;
        $("#video").attr("src", value);
    });
JS;
$this->registerJs($js);
?>
