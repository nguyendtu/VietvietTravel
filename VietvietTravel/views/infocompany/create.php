<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Infocompany */

$this->title = 'Create Infocompany';
$this->params['breadcrumbs'][] = ['label' => 'Infocompanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infocompany-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
