<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */

$this->title = 'Update Tour: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tours', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tour-update" style="position: relative">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(isset($success)){ ?>

        <div class="text-success text-center"><h3><?= $success ?></h3></div>
    <?php } ?>
    <?= $this->render('_form', [
        'model' => $model,
        'tourtype' => $tourtype,
        'small' => $small,
        'large' => $large,
    ]) ?>
</div>