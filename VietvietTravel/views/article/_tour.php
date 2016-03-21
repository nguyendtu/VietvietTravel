<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;
$tour = $model;

?>


<div class="thumbnail">
    <div class="row">
        <div class="col-md-5 hover-tour">
            <a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">
                <?= \yii\helpers\Html::img('@web/images/'. $tour->smallimg, ['alt' => 'tour']) ?>
                <!--<div class="tour-price price-top price-width">
                    <h4>Price from</h4>
                    <p class="price">$<?php /*echo $tour->price */?></p>
                    <p>per cabin</p>
                </div>-->
            </a>
            <p class="doc"></p>
            <p class="info"><em>Read more...</em></p>
        </div>
        <div class="col-md-7">
            <div class="caption">
                <h4><?php echo $tour->title ?></h4>
                <p><?php echo $tour->briefinfo ?></p>
                <button class="btn btn-primary">
                    <a href="<?php echo \yii\helpers\Url::to(['article/'. implode('-', explode(" ", $tour->title)). '-'])?>">
                        <span class="glyphicon glyphicon-share-alt text-info"></span>
                        <span class="text-info">READ MORE</span>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>