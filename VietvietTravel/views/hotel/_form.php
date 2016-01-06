<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'id_location')->textInput() ?>
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'editdate')->textInput() ?>
            <?= $form->field($model, 'hot')->textInput() ?>
            <?= $form->field($model, 'star')->textInput() ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'regdate')->textInput() ?>
            <?= $form->field($model, 'status')->textInput() ?>
            <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-xs-12">

            <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= FileUploadUI::widget([
    'model' => $small,
    'attribute' => 'fileUpload',
    'url' => ['file-upload/upload'],
    'gallery' => false,
    'options' => ['id' => 'smallimg'],
    'fieldOptions' => [
        'accept' => 'image/*',
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                    var smallimg = document.getElementById("hotel-smallimg");
                                    smallimg.value = "";
                                    var files = data.result.files;
                                    for(var i = 0; i < files.length; i++){
                                        smallimg.value = files[i].name;
                                    }
                                }',
        'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);
?>
<?= FileUploadUI::widget([
    'model' => $large,
    'attribute' => 'fileUpload',
    'url' => ['file-upload/upload'],
    'gallery' => false,
    'options' => ['id' => 'largeimg'],
    'fieldOptions' => [
        'accept' => 'image/*',
        'multiple' => true,
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                    var largeimg = document.getElementById("hotel-largeimg");
                                    files = data.result.files;
                                    console.log(files.length);
                                    for(var i = 0; i < files.length; i++){
                                        largeimg.value += files[i].name + " ";
                                    }
                                }',
        'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);
?>