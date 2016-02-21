<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->all(), 'id', 'name'), ['prompt' => '-- Choose a tourtype --']
    ) ?>

    <?= $form->field($model, 'regdate')->widget(DatePicker::className(),[
        'name' => 'regdate',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d-m-Y'),
        'options' => ['placeholder' => date('d-m-Y')],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'editdate')->widget(DatePicker::className(), [
        'name' => 'editdate',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d-m-Y'),
        'options' => ['placeholder' => date('d-m-Y')],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy',
        ]
    ]) ?>

    <?= $form->field($model, 'hot')->checkbox() ?>

    <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <div class="margin-top-1">
    <?= $form->field($model, 'id_user')->textInput() ?>
    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
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
                                    var smallimg = document.getElementById("article-smallimg");
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
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    var smallimg = document.getElementById("article-smallimg");
                                    smallimg.value = "";
                                }',
        ],
    ]);
    ?>
</div>
