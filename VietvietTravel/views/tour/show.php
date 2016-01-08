<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
//echo $sort->link('length');
?>

<div class="main-content">
    <div class="thumb">
        <h3 class="thumb-caption"><?php echo $model->name ?></h3>
        <div class="sort">
            <form id="sort-tour" class="form-inline" action="<?php echo \yii\helpers\Url::to(['tour/sort']); ?>" method="post" role="form">
                <div class="form-group">
                    <label for="sort_tour">Sorting Tour</label>
                    <select name="sort-tour" id="sort" class="form-control">
                        <option value="">None</option>
                        <option value="Descending">Descending</option>
                        <option value="Ascending">Ascending</option>
                    </select>
                    <?php echo $sort->link('length', ['id' => 'length_desc', 'class' => 'sr-only']); ?>
                </div>
            </form>
        </div>
        <div class="thumb-content">
            <?php
            echo ListView::widget([
                'dataProvider' => $provider,
                //'booktour' => $booktour,
                'summary' => '',
                'itemView' => '_show',
            ]);
            ?>
        </div>

    </div>
</div>