<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/*$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="admin">
    <img src="images/logo.png" alt="logo" class="logo-size">

    <div class="admin-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['role' => 'form'],
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
            'labelOptions' => ['class' => 'control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe', [
                'options' => ['class' => 'horizontal'],
            ])->checkbox([]) ?>
        <div class="horizontal">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary fixed-right', 'name' => 'login-button', 'id' => 'btn_login_admin']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>