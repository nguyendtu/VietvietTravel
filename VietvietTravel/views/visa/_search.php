<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VisaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'nation') ?>

    <?php // echo $form->field($model, 'numapply') ?>

    <?php // echo $form->field($model, 'visatype') ?>

    <?php // echo $form->field($model, 'processtime') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'usebefore') ?>

    <?php // echo $form->field($model, 'receiveinfo') ?>

    <?php // echo $form->field($model, 'knwthrough') ?>

    <?php // echo $form->field($model, 'paymethod') ?>

    <?php // echo $form->field($model, 'regdate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
