<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'smallimg',
                'content' => function($model){
                    return "<img src='images/". $model->smallimg ."'></img>";
                },
                'format' => 'image',
                'options' => [
                    'width' => '100px',
                ]
            ],
            'title',
            [
                'attribute' => 'type',
                'value' => 'tourtype.name',
                'options' => [
                    'width' => '200px',
                ],
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->all(), 'id', 'name'),
            ],
            'briefinfo:ntext',

            // 'detailinfo:ntext',
            // 'regdate',
            // 'editdate',
            // 'id_user',
            // 'hot',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
