<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */

$this->title = 'Update Hotel: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-update" style="position: relative">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'location' => $location,
        'small' => $small,
        'large' => $large,
    ]) ?>

</div>
