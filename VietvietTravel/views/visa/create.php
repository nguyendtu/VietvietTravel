<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Visa */

$this->title = 'Create Visa';
$this->params['breadcrumbs'][] = ['label' => 'Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="visa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'visadetails' => $visadetails,
        'num' => $num,
    ]) ?>

</div>
