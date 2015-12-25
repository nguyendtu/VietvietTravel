<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Booktour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booktour-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tour')->textInput() ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nadults')->textInput() ?>

    <?= $form->field($model, 'listname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child')->textInput() ?>

    <?= $form->field($model, 'childinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'depdate')->textInput() ?>

    <?= $form->field($model, 'idea')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visa')->textInput() ?>

    <?= $form->field($model, 'usebefore')->textInput() ?>

    <?= $form->field($model, 'reciveinfo')->textInput() ?>

    <?= $form->field($model, 'paymethod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'knwthrough')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
