<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php \yii\widgets\Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'width' => '20%',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'id',
            'fullname',
            'email:email',
            'phone',
            [
                'attribute' => 'nation',
                'options' => [
                    'width' => '20%',
                ],
            ],
            // 'message:ntext',
            // 'usebefore',
            // 'receiveinfo',
            // 'knwthrough',
            // 'regdate',
            // 'status',
            [
                'attribute' => 'status',
                'content' => function($model, $key, $index, $column){
                    $url = \yii\helpers\Url::to(['contact/update-status', 'id' => $model->id]);
                    return $model->status? "<a href='$url' style='color: green'>Complete</a>" : "<a href='$url' style='color: red'>Unfinished</a>";
                },
                'options' => [
                    'width' => '10%',
                ],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end() ?>
</div>
