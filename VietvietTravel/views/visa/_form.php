<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numapply')->textInput() ?>

    <?= $form->field($model, 'visatype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'processtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'usebefore')->textInput() ?>

    <?= $form->field($model, 'receiveinfo')->textInput() ?>

    <?= $form->field($model, 'knwthrough')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paymethod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regdate')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
