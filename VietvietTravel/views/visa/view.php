<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$visaDetails = \app\models\Visadetail::find()->where(['id_visa' => $model->id]);
$provider = new \yii\data\ActiveDataProvider([
    'query' => $visaDetails,
    'pagination' => [
        'pageSize' => 20,
    ],
]);
?>
<div class="visa-view">

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
            'fullname',
            'email:email',
            'mobile',
            'nation',
            'numapply',
            'visatype',
            'processtime',
            'message:ntext',
            'usebefore',
            'receiveinfo',
            'knwthrough',
            'paymethod',
            'regdate',
            'status',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $provider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_visa',
            'fullname',
            'nation',
            'idpassport',
            // 'birthday',
            // 'expire',
            // 'flightdetail',
            // 'arrivaldate',
            // 'exitdate',
            // 'portarrival',
            // 'purposevisit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
