<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HotelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'star') ?>

    <?= $form->field($model, 'id_location') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'briefinfo') ?>

    <?php // echo $form->field($model, 'detailinfo') ?>

    <?php // echo $form->field($model, 'smallimg') ?>

    <?php // echo $form->field($model, 'largeimg') ?>

    <?php // echo $form->field($model, 'regdate') ?>

    <?php // echo $form->field($model, 'editdate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'hot') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
