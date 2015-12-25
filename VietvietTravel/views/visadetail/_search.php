<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VisadetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visadetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_visa') ?>

    <?= $form->field($model, 'fullame') ?>

    <?= $form->field($model, 'nation') ?>

    <?= $form->field($model, 'idpassport') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'expire') ?>

    <?php // echo $form->field($model, 'flightdetail') ?>

    <?php // echo $form->field($model, 'arrivaldate') ?>

    <?php // echo $form->field($model, 'exitdate') ?>

    <?php // echo $form->field($model, 'portarrival') ?>

    <?php // echo $form->field($model, 'purposevisit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
