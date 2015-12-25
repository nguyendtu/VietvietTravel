<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tourtype */

$this->title = 'Update Tourtype: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tourtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tourtype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
