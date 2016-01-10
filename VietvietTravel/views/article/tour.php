<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-content">
    <div class="thumb">

        <h3 class="thumb-caption">TOUR DIARY</h3>
        <div class="thumb-content">
            <?php
            echo ListView::widget([
                'dataProvider' => $provider,
                'summary' => '',
                'itemView' => '_tour',
            ]);
            ?>
        </div>

    </div>
</div>