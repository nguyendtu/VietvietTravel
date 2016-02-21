<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TourtypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tourtypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourtype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Create Tourtype', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-md-7">
            <h3 class="text-primary thumb-caption text-center">CREATE NEW TOURTYPE</h3>
            <?= $this->render('_form', [
                'model' => $model,
                'small' => $small,
            ]) ?>
        </div>
        <div class="col-md-5">
            <h3 class="text-primary thumb-caption text-center">TOURTYPE TREE</h3>
            <div id="tree_view">
                <?= $tree ?>
            </div>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>