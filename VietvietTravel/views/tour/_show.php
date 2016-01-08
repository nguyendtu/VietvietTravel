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
                <img src="images/<?php echo $tour->smallimg ?>" alt="Tour">
                <div class="tour-price price-top price-width">
                    <h4>Price from</h4>
                    <p class="price">$<?php echo $tour->price ?></p>
                    <p>per cabin</p>
                </div>
            </a>
            <p class="doc"></p>
            <p class="info"><em>Read more...</em></p>
        </div>
        <div class="col-md-7">
            <div class="caption">
                <h4><?php echo $tour->name ?></h4>
                <p><?php echo $tour->briefinfo ?></p>
                <ul class="tour-info inline text-right">
                    <li class="details">
                        <span class="glyphicon glyphicon-share-alt"></span> <a class="details" href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">Details</a>
                    </li>
                    <li class="enquire" data-toggle="modal" data-target="#book_tour">
                        <span class="glyphicon glyphicon-share-alt"></span>
                        ENQUIRE NOW
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="book_tour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">BOOKING FORM</h4>
                        <p class="note"><em>* indicates a required field</em></p>
                    </div>
                    <div class="modal-body">
                        <?php $booktour = new \app\models\Booktour(); ?>
                        <?= $this->render("_booktourForm", ['booktour' => $booktour, 'model' => $model]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>