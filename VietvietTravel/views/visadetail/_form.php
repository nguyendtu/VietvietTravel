<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Visadetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visadetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_visa')->textInput() ?>

    <?= $form->field($model, 'fullame')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpassport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'expire')->textInput() ?>

    <?= $form->field($model, 'flightdetail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrivaldate')->textInput() ?>

    <?= $form->field($model, 'exitdate')->textInput() ?>

    <?= $form->field($model, 'portarrival')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purposevisit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

