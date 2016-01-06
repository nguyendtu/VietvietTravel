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
        <h3 class="thumb-caption">Hotels in <?php echo $model->name ?></h3>
        <div class="thumb-content">
            <div class="header">
                <p><?php echo $model->description ?></p>
                <p class="right"><a href="#"><em>Read more</em></a></p>
            </div>
            <div class="sort">
                <form id="sort-hotel" class="form-inline" action="#" method="get" role="form">
                    <div class="form-group">
                        <label for="sort_hotel">Sorting Hotel</label>
                        <select name="sort-hotel" id="sort_hotel" class="form-control">
                            <option value="1">Descending</option>
                            <option value="1">Escending</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="hotel" id="default">
                        <label for="default">Default</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="hotel" id="star">
                        <label for="star">Star Rating</label>
                    </div>
                    <button class="btn btn-default">Sort</button>
                </form>
            </div>
            <div class="row">
                <?php
                    echo ListView::widget([
                        'dataProvider' => $provider,
                        'summary' => '',
                        'itemView' => '_show',
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>