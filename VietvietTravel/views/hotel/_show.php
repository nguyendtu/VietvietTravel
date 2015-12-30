<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
$hotel = $model;
?>


    <div class="col-sm-6 col-md-6">
        <div class="thumbnail">
            <div class="hover-tour">
                <a href="<?php echo \yii\helpers\Url::to(['hotel/show-detail', 'id' => $hotel->id]); ?>"><img src="images/<?php echo $hotel->smallimg ?>" alt="hotel"></a>
                <p class="doc"></p>
                <p class="info"><em>Read more...</em></p>
            </div>
            <div class="caption">
                <h4><?php echo $hotel->name ?></h4>
                <p><?php echo $hotel->briefinfo ?></p>
                <address>
                    <strong>Address:</strong> <?php echo $hotel->address ?> <br>
                    <strong>Location:</strong> Hotels in <?php echo $model->name ?> City
                </address>
            </div>
            <div class="bottom-bar">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="tour-info">
                            <li class="details">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a class="details" href="<?php echo \yii\helpers\Url::to(['hotel/show-detail', 'id' => $hotel->id]) ?>">Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="hotel-price">
                            <ul class="hotel-star">
                                <?php for($i = 0; $i < 5; $i++){
                                    if($i < $hotel->star){ ?>
                                        <li class="star-yellow"><span class="glyphicon glyphicon-star"></span></li>
                                    <?php } else{ ?>
                                        <li><span class="glyphicon glyphicon-star"></span></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                            <?php if($hotel->price){ ?>
                                <p>Price from <span class="price-size">$<?php echo $hotel->price ?></span></p>
                            <?php }else{ ?>
                                <p>contact for best price</p>
                            <?php } ?>
                            <div class="price"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
