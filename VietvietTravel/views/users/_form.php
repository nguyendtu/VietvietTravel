<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permit')->dropDownList([ 'A' => 'A', 'C' => 'C', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'DeActive',
    ]) ?>

    <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'authKey', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true, 'value' => 'authKey']) ?>

    <?= $form->field($model, 'accessToken', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true, 'value' => 'accessToken']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
