<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Tourtype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tourtype-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                //'input' => 'col-sm-8'
                //'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->where(['<>', 'parent', 'article'])->all(), 'parent', 'parent'), [
            'prompt' => '--Choose parent--'
        ]

    ) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true, 'readonly' => true]) ?>
    <?= $form->field($model, 'simg')->label('Smallimg')->widget(FileInput::classname(), [
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

                $("#tourtype-icon").val(fileName);
            }',
            'filesuccessremove' => 'function(event, id){
                var name = $("#" + id + " img").attr("title"),
                    fileName = name.replace(" ", "_");

                $.post("/file-upload/delete/" + fileName);

                $("#tourtype-icon").val("");
            }',
        ]
    ]) ?>

    <div class="form-group">
        <label for="" class="label-control col-sm-2"></label>
        <div class="col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>