<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Infocompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="infocompany-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
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

    <?= $form->field($model, 'slogo', ['options' => ['name' => 'simg']])->label('Logo')->widget(FileInput::classname(), [
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
                var fileName = data.files[index].name.replace(" (Copy)", "1").replace(" ", "_");

                $("#infocompany-logo").val(fileName);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);

                $("#infocompany-logo").val("");
            }',
        ]
    ]) ?>

    <?= $form->field($model, 'logo')->label("")->textInput(['maxlength' => true, 'class' => 'sr-only']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'license')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zalo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yahoo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'viber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map')->textarea(['maxlength' => false]) ?>

    <div class="form-group">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="view-map"><?= $model->map ?></div>
        </div>
    </div>

        <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <iframe id="video" <?php if($model->video){ ?> src="<?=$model->video?>" <?php } ?> width="100%" height="400"></iframe>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-1" for=""></label>
        <div class="col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
$js = <<<JS
    if('$model->logo' != ""){
    var img =  "<div class='file-preview-frame' id='$model->logo' data-fileindex='0'>" +
                    "<img src='/images/$model->logo' class='file-preview-image' title='$model->logo' alt='$model->logo' style='width:auto;height:160px;'>" +
                    "<div class='file-thumbnail-footer'>" +
                    "<div class='file-footer-caption' title='$model->logo'>$model->logo</div>" +
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

    $("#w0").on("blur", "#infocompany-video", function(e){
        var value = e.target.value.replace("watch?", "").replace("=", "/");
        e.target.value = value;
        $("#video").attr("src", value);
    });
JS;
$this->registerJs($js);
?>

