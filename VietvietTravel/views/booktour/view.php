<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Booktour */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Booktours', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booktour-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_tour',
            'fullname',
            'email:email',
            'phone',
            'nation',
            'nadults',
            'listname',
            'child',
            'childinfo:ntext',
            'depdate',
            'idea:ntext',
            'visa',
            'usebefore',
            'reciveinfo',
            'paymethod',
            'knwthrough',
        ],
    ]) ?>

</div>
