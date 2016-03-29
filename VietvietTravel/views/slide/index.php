<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Slide', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'image',
                'format' => 'image',
                'options' => [
                    'width' => '200px',
                    'height' => '200px',
                ],
                'value' => function($model){
                    return '@web/images/' . $model->image;
                }
            ],
            'link',
            [
                'attribute' => 'position',
                'value' => function($model){
                    if($model->position == 1){
                        return "Slide";
                    }else if($model->position == 2){
                        return " Small slide top";
                    }else{
                        return "Small slide bottom";
                    }
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'options' => [
                    'width' => '5%',
                ]
            ],
        ],
    ]); ?>

</div>
