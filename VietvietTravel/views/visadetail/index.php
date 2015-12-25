<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisadetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visadetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visadetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Visadetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_visa',
            'fullame',
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
