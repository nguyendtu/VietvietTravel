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
                            <img src="images/<?php echo $model->smallimg ?>" alt="<?php echo $model->name ?>">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="caption info-detail">
                            <h4>HOTEL INFORMATION</h4>
                            <ul>
                                <li class="star-yellow">
                                    <span class="glyphicon glyphicon-menu-right"></span>
                                    Star:
                                    <?php for($i = 0; $i < $model->star; $i++){ ?>
                                        <span class="glyphicon glyphicon-star"></span>
                                    <?php } ?>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-menu-right"></span>
                                    <p>Address: <?php echo $model->address ?></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-menu-right"></span>
                                    <p>Location: <?php echo $location->name ?></p>
                                </li>
                            </ul>
                            <div class="phone">
                                <p>Please call to book</p>
                                <h4 class="text-danger">
                                    <span class="glyphicon glyphicon-phone-alt"></span>
                                    <?php echo $model->phone ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <p><?php echo $model->briefinfo ?></p>
            </div>
            <div class="galleria">
                <?php $slides = explode(' ', $model->largeimg);
                for($i = 0; $i < sizeOf($slides) - 1; $i++){
                    ?>
                    <img src="images/<?php echo $slides[$i] ?>" />
                <?php } ?>
            </div>
            <!--<div id="wrapper">
                <div class="slider-wrapper theme-default">
                    <div id="hotel_slider" class="nivoSlider">
                        <?php /*$slides = explode(' ', $model->largeimg);
                            for($i = 0; $i < sizeOf($slides) - 1; $i++){
                        */?>
                        <img src="images/<?php /*echo $slides[$i] */?>" data-thumb="images/<?php /*echo $slides[$i] */?>" alt="" />
                        <?php /*} */?>
                    </div>
                    <div id="htmlcaption" class="nivo-html-caption">
                        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                    </div>
                </div>
            </div>-->
            <div class="hotel-info">
                <?php echo $model->detailinfo ?>
            </div>
            <div class="related-hotel">
                <div class="row">
                    <?php foreach($related as $hotel){
                        if($hotel->id != $model->id){
                    ?>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <a href="">
                                    <img src="images/<?php echo $hotel->smallimg ?>" alt="hotel">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-7 col-xs-7">
                                <h4><a href="<?php echo yii\helpers\Url::to(['hotel/show-detail', 'id' => $hotel->id])?>"><?php echo $hotel->name ?></a></h4>
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


