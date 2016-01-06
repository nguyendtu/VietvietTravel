<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tourtype')->textInput() ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'startfrom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'regdate')->textInput() ?>

    <?= $form->field($model, 'editdate')->textInput() ?>

    <?= $form->field($model, 'hot')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

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
                                    var smallimg = document.getElementById("tour-smallimg");
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
                                    var largeimg = document.getElementById("tour-largeimg");
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
