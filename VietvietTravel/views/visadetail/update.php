<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Visadetail */

$this->title = 'Update Visadetail: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Visadetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visadetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
