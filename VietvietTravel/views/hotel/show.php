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
        <h3 class="thumb-caption">Hotels in <?php if(isset($model->name)) echo $model->name; else echo "search result" ?></h3>
        <div class="thumb-content">
            <?php if(isset($model->description)){ ?>
            <div class="header">
                <p><?php echo $model->description ?></p>
                <!--<p class="right"><a href="#"><em>Read more</em></a></p>-->
            </div>
            <?php } ?>
            <div class="sort">
                <form id="sort-hotel" class="form-inline" action="#" method="get" role="form">
                    <div class="form-group">
                        <label for="sort_hotel">Sorting Hotel</label>
                        <select name="sort-hotel" id="sort" class="form-control">
                            <option value="">None</option>
                            <option value="Descending">Descending</option>
                            <option value="Ascending">Ascending</option>
                        </select>
                        <?php //echo $sort->link('star', ['id' => 'length_desc', 'class' => 'sr-only']); ?>
                    </div>
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