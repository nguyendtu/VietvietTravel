<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$tourtype = $model->tourtype;
?>

<div class="main-content">
    <div class="thumb">
        <h3 class="thumb-caption"><?php echo $model->name ?></h3>
        <div class="thumb-content">
            <div class="header">
                <div class="row">
                    <div class="col-md-5">
                        <a href="">
                            <img src="images/<?php echo $model->smallimg ?>" alt="..">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="caption info-detail">
                            <h4>TOUR INFORMATION</h4>
                            <ul>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Code: <?php echo $model->code ?></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Length: <?php echo $model->length ?></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Type: <a href="<?php echo \yii\helpers\Url::to(['tour/show', 'Day Tour']); ?>"><?php echo $tourtype->name ?></a></p>
                                </li>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Start From: <a href=""><?php echo $model->startfrom ?></a></p>
                                </li><!--
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Review: <a href=""><?php /*echo */?></a></p>
                                </li>-->
                            </ul>
                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#book_tour">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                BOOK THIS TOUR
                            </button>
                        </div>
                    </div>
                </div>
                <p><?php echo $model->detailinfo ?></p>
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
                    <div id="tour_slider" class="nivoSlider">
                        <?php /*$slides = explode(' ', $model->largeimg);
                        for($i = 0; $i < sizeOf($slides); $i++){
                            */?>
                            <img src="images/<?php /*echo $slides[$i] */?>" data-thumb="images/<?php /*echo $slides[$i] */?>" alt="" />
                        <?php /*} */?>
                    </div>
                </div>
            </div>-->
            <hr>
            <div class="related-tour">
                <h4>Related Tours</h4>
                <ul>
                    <?php foreach($related as $tour){
                        if($tour->id != $model->id){
                    ?>
                    <li><a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>"><?php echo $tour->name ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
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

