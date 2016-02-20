<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Visa', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'fullname',
            'email:email',
            'mobile',
            // 'nation',
            'numapply',
            // 'visatype',
            // 'processtime',
            // 'message:ntext',
            // 'usebefore',
            // 'receiveinfo',
            // 'knwthrough',
            // 'paymethod',
            'regdate',
            // 'status',
            [
                'attribute' => 'status',
                'content' => function($model){
                    $url = \yii\helpers\Url::to(['visa/update-status', 'id' => $model->id]);
                    return $model->status? "<a href='$url' style='color: green'>Complete</a>" : "<a href='$url' style='color: red'>Unfinished</a>";
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
