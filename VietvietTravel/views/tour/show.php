<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
echo $sort->link('length');
?>

<div class="main-content">
    <div class="thumb">
        <h3 class="thumb-caption"><?php echo $model->name ?></h3>
        <div class="sort">
            <form id="sort-tour" class="form-inline" action="<?php echo \yii\helpers\Url::to(['tour/sort']); ?>" method="post" role="form">
                <input type="text" value="<?php echo $model->name ?>" name="tourtype" class="sr-only">
                <div class="form-group">
                    <?php if(isset($sort)){ ?>
                    <label for="sort_tour">Sorting Tour</label>
                    <select name="sort-tour" id="sort_tour" class="form-control">
                        <option value="SORT_DESC" <?php if($sort['sort-tour'] == "SORT_DESC") echo 'checked="true"' ?>>Descending</option>
                        <option value="SORT_ASC" <?php if($sort['sort-tour'] == "SORT_ASC") echo 'checked="true"' ?>>Ascending</option>
                    </select>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="radio" name="tour" value="name" id="default" checked="true">
                    <label for="default">Default</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="tour" value="length" id="star">
                    <label for="star">Length</label>
                </div>
                <button class="btn btn-default">Sort</button>
            </form>
        </div>
        <div class="thumb-content">
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