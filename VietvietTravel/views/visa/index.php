<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fullname',
            'email:email',
            'mobile',
            'nation',
            // 'numapply',
            // 'visatype',
            // 'processtime',
            // 'message:ntext',
            // 'usebefore',
            // 'receiveinfo',
            // 'knwthrough',
            // 'paymethod',
            // 'regdate',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
