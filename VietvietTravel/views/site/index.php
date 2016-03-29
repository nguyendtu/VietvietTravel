<?php

/* @var $this yii\web\View */

$this->title = 'VietViet Travel';
?>
<div class="site-index">
    <div class="main-content">
        <div class="thumb">
            <h3 class="thumb-caption">Featured Cruises</h3>
            <div class="thumb-content">
                <!--= =============================== =========================-->
                <div id="wrapper fix">
                    <div class="slider-wrapper theme-default">
                        <div id="slider_tour_featured" class="nivoSlider small_slider">
                            <?php foreach($slideCruises as $slide){ ?>

                                <?= \yii\helpers\Html::img('@web/images/'. $slide['image'], ['data-thumb'=>"@web/" . $slide['image'], "alt"=>""]) ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--= =============================== =========================-->
                <div class="row">
                    <?php
                        foreach($tourHotCruises as $tour){
                    ?>
                    <div class="col-sm-6 col-md-6 lg-tour">
                        <div class="thumbnail">
                            <div class="hover-tour">
                                <a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>">
                                    <?= \yii\helpers\Html::img('@web/images/'. $tour->smallimg) ?>
                                </a>
                                <p class="doc"></p>
                                <p class="info"><em>Read more...</em></p>
                            </div>
                            <div class="caption">
                                <h4><a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>"><?php echo $tour->name ?></a></h4>
                                <p class="text-justify"><?php echo $tour->briefinfo ?></p>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="tour-price price-width">
                                            <?php if($tour->price == '-1'){ ?>
                                                <h4>Please</h4>
                                                <p class="price" >Contact</>
                                                <p>Us</p>
                                            <?php } elseif($tour->price == '-2'){ ?>
                                                <h4>Please</h4>
                                                <p class="price" >Read</>
                                                <p>Details page</p>
                                            <?php } else{ ?>
                                                <h4>Price from</h4>
                                                <p class="price">$<?php echo $tour->price ?></p>
                                                <p>per person</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <ul class="infomation">
                                            <li class="details text-bold">
                                                <span class="glyphicon glyphicon-share-alt"></span> <a class="details" href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>">Details</a>
                                            </li>
                                            <li class="enquire" data-toggle="modal" data-target="#book_tour_<?= $tour->id ?>">
                                                <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                ENQUIRE NOW
                                            </li>
                                        </ul>
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
                                                    <?= $this->render("../tour/_booktourForm", ['booktour' => $booktour, 'model' => $tour]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="footer-tour">
                <p><a href="<?= \yii\helpers\Url::to(['tour/search', 'tourStyle' => 'bicycle']) ?>">View all bicycle tour</a></p>
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
        </div>
        <div class="thumb">
            <h3 class="thumb-caption">The tours have been interested lately</h3>
            <div class="thumb-content">
                <!--= =============================== =========================-->
                <div id="wrapper fix">
                    <div class="slider-wrapper theme-default">
                        <div id="slider_tour_interested" class="nivoSlider small_slider">
                            <?php foreach($slideLately as $slide){ ?>
                                <?= \yii\helpers\Html::img('@web/images/'. $slide['image'], ['data-thumb'=>"@web/" . $slide['image'], "alt"=>""]) ?>
                            <?php } ?>
                        </div>
                        <div id="htmlcaption" class="nivo-html-caption">
                            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                        </div>
                    </div>
                </div>
                <!--= =============================== =========================-->
                <?php foreach($tourHotLately as $tour){ ?>
                <div class="thumbnail">
                    <div class="row">
                        <div class="col-md-5 hover-tour">
                            <a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>">
                                <?= \yii\helpers\Html::img('@web/images/'. $tour->smallimg) ?>
                                <div class="tour-price price-top price-width">
                                    <?php if($tour->price == '-1'){ ?>
                                        <h4>Please</h4>
                                        <p class="text-price" >Contact</p>
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
                        <div class="col-md-7 sm-tour">
                            <div class="caption">
                                <h4><a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>"><?php echo $tour->name ?></a></h4>
                                <p><?php echo $tour->briefinfo ?></p>
                                <ul class="infomation inline text-right">
                                    <li class="details text-bold">
                                        <span class="glyphicon glyphicon-share-alt"></span> <a class="details" href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]) ?>">Details</a>
                                    </li>
                                    <li class="enquire">
                                        <span class="glyphicon glyphicon-circle-arrow-right"></span> <a class="enquire" href="#">ENQUIRE NOW</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="footer-tour">
                <p><a href="<?= \yii\helpers\Url::to(['tour/search', 'tourStyle' => 'travel']) ?>">View all best selling tours</a></p>
                <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
        </div>
    </div>
</div>
