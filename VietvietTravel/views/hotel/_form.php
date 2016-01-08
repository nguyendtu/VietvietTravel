<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'id_location')->dropDownList(
                \yii\helpers\ArrayHelper::map($location->find()->all(), 'id', 'name'), ['prompt' => '-- Choose Location --']) ?>
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'editdate')->widget(DatePicker::className(),[
                'name' => 'regdate',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'value' => date('d-m-Y'),
                'options' => ['placeholder' => date('d-m-Y')],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]) ?>
            <?= $form->field($model, 'hot')->checkbox() ?>
        </div>
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'star')->textInput() ?>
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'regdate')->widget(DatePicker::className(),[
                'name' => 'regdate',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'value' => date('d-m-Y'),
                'options' => ['placeholder' => date('d-m-Y')],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]) ?>
            <?= $form->field($model, 'status')->textInput() ?>
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <div class="margin-top-1">
                <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <div class="margin-top-1">
                    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="margin-top-2">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="smallUpload">
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
</div>

<div class="largeUpload">
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
</div>