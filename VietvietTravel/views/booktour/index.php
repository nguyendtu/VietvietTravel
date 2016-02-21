<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

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

    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'id_tour',
                'value' => 'tour.name',
                'label' => 'Tour name',
            ],
            'fullname',
            'email:email',
            'phone',
            // 'nation',
            'nadults',
            // 'listname',
            // 'child',
            // 'childinfo:ntext',
            // 'depdate',
            // 'idea:ntext',
            [
                'attribute' => 'idea',
                'value' => 'idea',
                'label' => 'Idea',
                'format' => 'ntext',
            ],
            // 'visa',
            // 'usebefore',
            // 'reciveinfo',
            // 'paymethod',
            // 'knwthrough',
            'depdate',
            // 'status',
            [
                'attribute' => 'status',
                'content' => function($model, $key, $index, $column){
                    $url = \yii\helpers\Url::to(['booktour/update-status', 'id' => $model->id]);
                    return $model->status? "<a href='$url' style='color: green'>Complete</a>" : "<a href='$url' style='color: red'>Unfinished</a>";
                },
                'filter' => [
                    'Complete' => 'Complete',
                    'Unfinished' => 'Unfinished',
                ],
                'options' => [
                    'width' => '100px',
                ],
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
