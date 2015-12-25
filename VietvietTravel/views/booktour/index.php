<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooktourSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Booktours';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booktour-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Booktour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tour',
            'fullname',
            'email:email',
            'phone',
            // 'nation',
            // 'nadults',
            // 'listname',
            // 'child',
            // 'childinfo:ntext',
            // 'depdate',
            // 'idea:ntext',
            // 'visa',
            // 'usebefore',
            // 'reciveinfo',
            // 'paymethod',
            // 'knwthrough',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
