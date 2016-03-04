<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/*$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;*/
$company = \app\models\Infocompany::find()->where(['id' => 1])->one();
?>
<div class="admin">
    <?= \yii\helpers\Html::img('@web/images/' . $company->logo, ['alt' => 'logo', 'class' => 'logo-size']) ?>

    <div class="admin-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['role' => 'form'],
        'method' => 'post',
        'action' => ['admin/login'],
        'fieldConfig' => [
            'template' => "{label}<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
            'labelOptions' => ['class' => 'control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'email') ?>

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