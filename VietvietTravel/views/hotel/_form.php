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
            <?/*= FileUploadUI::widget([
                'model' => $small,
                'attribute' => 'fileUpload',
                'url' => ['file-upload/upload'],
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                            console.log(e);
                            console.log(data);
                        }',
                    'fileuploadfail' => 'function(e, data) {
                            console.log(e);
                            console.log(data);
                        }',
                ],
            ]);
            */?>
            <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>
            <?= FileUploadUI::widget([
                'model' => $large,
                'attribute' => 'fileUpload',
                'url' => ['file-upload/upload'],
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 2000000
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
                    'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
                ],
            ]);
            ?>
            <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


