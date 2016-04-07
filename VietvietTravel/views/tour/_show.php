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
                <?= \yii\helpers\Html::img('@web/images/'. $tour->smallimg, ['alt' => 'Tour', 'id' => 'img-size']) ?>
                <div class="tour-price price-top price-width">
                    <?php if($tour->price == '-1'){ ?>
                        <h4>Please</h4>
                        <p class="text-price" >Contact</>
                        <p>Us</p>
                    <?php } elseif($tour->price == '-2'){ ?>
                        <h4>Please</h4>
                        <p class="text-price" >Read</>
                        <p>Details page</p>
                    <?php } else{ ?>
                        <h4>Price from</h4>
                        <p class="price">$<?php echo $tour->price ?></p>
                        <p>per person</p>
                    <?php } ?>
                </div>
            </a>
            <p class="doc"></p>
            <p class="info"><em>Read more...</em></p>
        </div>
        <div class="col-md-7" id="thumb-content">
            <div class="caption">
                <h4><a href="<?= \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>"><?php echo $tour->name ?></a></h4>
                <p><?= \app\components\Helpers::limit_text($tour->briefinfo, 40) ?></p>
                <ul class="tour-info inline text-right">
                    <li class="details">
                        <span class="glyphicon glyphicon-share-alt"></span> <a class="details" href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">Details</a>
                    </li>
                    <li class="enquire" data-toggle="modal" data-target="#book_tour_<?= $tour->id?>">
                        <span class="glyphicon glyphicon-circle-arrow-right"></span>
                        ENQUIRE NOW
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal fade" id="book_tour_<?= $tour->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">BOOKING FORM</h4>
                        <p class="note"><em>* indicates a required field</em></p>
                    </div>
                    <div class="modal-body">
                        <?php $booktour = new \app\models\Booktour(); ?>
                        <?= $this->render("_booktourForm", ['booktour' => $booktour, 'model' => $tour]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>