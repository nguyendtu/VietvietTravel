<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BooktourSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booktour-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tour') ?>

    <?= $form->field($model, 'fullname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'nation') ?>

    <?php // echo $form->field($model, 'nadults') ?>

    <?php // echo $form->field($model, 'listname') ?>

    <?php // echo $form->field($model, 'child') ?>

    <?php // echo $form->field($model, 'childinfo') ?>

    <?php // echo $form->field($model, 'depdate') ?>

    <?php // echo $form->field($model, 'idea') ?>

    <?php // echo $form->field($model, 'visa') ?>

    <?php // echo $form->field($model, 'usebefore') ?>

    <?php // echo $form->field($model, 'reciveinfo') ?>

    <?php // echo $form->field($model, 'paymethod') ?>

    <?php // echo $form->field($model, 'knwthrough') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
