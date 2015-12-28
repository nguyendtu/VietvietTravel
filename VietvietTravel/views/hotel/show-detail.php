<?php
    use yii\helpers\Html;

    $location = $model->location;
?>

<div class="main-content">
    <div class="thumb">
        <h3 class="thumb-caption"><?php echo $model->name ?></h3>
        <div class="thumb-content">
            <div class="header">
                <div class="row">
                    <div class="col-md-5">
                        <a href="">
                            <img src="<?php echo $model->smallimg ?>" alt="<?php echo $model->name ?>">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="caption info-detail">
                            <h4>HOTEL INFORMATION</h4>
                            <ul>
                                <li class="star-yellow">
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    Star:
                                    <?php for($i = 0; $i < $model->star; $i++){ ?>
                                        <span class="glyphicon glyphicon-star"></span>
                                    <?php } ?>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Address: <?php echo $model->address ?></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Location: <?php echo $location->name ?></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Customers' Reviews: 0 review</p>
                                </li>
                            </ul>
                            <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                BOOK THIS HOTEL
                            </button>
                        </div>
                    </div>
                </div>
                <p><?php echo $model->briefinfo ?></p>
            </div>
            <div id="wrapper">
                <div class="slider-wrapper theme-default">
                    <div id="hotel_slider" class="nivoSlider">
                        <?php $slides = explode(' ', $model->largeimg);
                            for($i = 0; $i < sizeOf($slides); $i++){
                        ?>
                        <img src="assets/images/<?php echo $slides[$i] ?>" data-thumb="assets/images/<?php echo $slides[$i] ?>" alt="" />
                        <?php } ?>
                    </div>
                    <div id="htmlcaption" class="nivo-html-caption">
                        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                    </div>
                </div>
            </div>
            <div class="hotel-info">
                <?php echo $model->detailinfo ?>
            </div>
            <div class="related-hotel">
                <div class="row">
                    <?php foreach($related as $hotel){
                        if($hotel->id != $model->id){
                    ?>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="">
                                    <img src="<?php echo $hotel->smallimg ?>" alt="hotel">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <h4><?php echo $hotel->name ?></h4>
                                <ul class="star-yellow hotel-star">
                                    <?php for($i = 0; $i < $hotel->star; $i++){ ?>
                                        <li><span class="glyphicon glyphicon-star"></span></li>
                                    <?php } ?>
                                </ul>
                                <p>Address: <?php echo $hotel->address ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>


