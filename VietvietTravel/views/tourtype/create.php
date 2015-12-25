<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tourtype */

$this->title = 'Create Tourtype';
$this->params['breadcrumbs'][] = ['label' => 'Tourtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
