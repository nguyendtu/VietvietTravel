<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'star',
            'id_location',
            'address',
            // 'price',
            // 'briefinfo:ntext',
            // 'detailinfo:ntext',
            // 'smallimg',
            // 'largeimg',
            // 'regdate',
            // 'editdate',
            // 'status',
            // 'hot',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
