<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hotel */

$this->title = 'Create Hotel';
$this->params['breadcrumbs'][] = ['label' => 'Hotels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-create" style="position: relative">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'location' => $location,
        'small' => $small,
        'large' => $large,
    ]) ?>

</div>
