<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$tourtype = $model->tourtype;
?>

<div class="main-content">
    <div class="thumb">
        <h3 class="thumb-caption"><?php if(isset($model->name)) echo $model->name ?></h3>
        <div class="thumb-content">
            <div class="header">
                <div class="row">
                    <div class="col-md-5">
                        <a href="">
                            <?php if (isset($model->smallimg)) { ?>
                            <?= \yii\helpers\Html::img('@web/images/'. $model->smallimg) ?>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="caption info-detail">
                            <h4>TOUR INFORMATION</h4>
                            <ul>
                                <?php if(isset($model->code)){ ?>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Code: <?= $model->code ?></p>
                                </li>
                                <?php } ?>
                                <?php if(isset($model->length)){ ?>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Length: <?= $model->length ?></p>
                                </li>
                                <?php } ?>
                                <?php if(isset($tourtype->name)){ ?>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Tour Type: <a href="<?php echo \yii\helpers\Url::to(['tour/show', 'Day Tour']); ?>"><?php echo $tourtype->name ?></a></p>
                                </li>
                                <?php } ?>
                                <?php if(isset($model->startfrom)) { ?>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Start From: <a href=""><?= $model->startfrom?></a></p>
                                </li>
                                <?php } ?>
                                <?php if(isset($model->keyword)){ ?>
                                <li>
                                    <span class="glyphicon glyphicon-share-alt"></span>
                                    <p>Keyword:
                                        <?php foreach(explode(",", $model->keyword) as $item){
                                            echo Html::a($item, ['/tour/search?keyWord=' . trim($item)], ['display' => 'inline-block']);
                                        } ?>

                                    </p>

                                </li>
                                <?php } ?>
                            </ul>
                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#book_tour">
                                <span class="glyphicon glyphicon-share-alt"></span>
                                BOOK THIS TOUR
                            </button>
                        </div>
                        <div class="fb-like" data-href="http://viettravel.dev/tour/show-detail/<?php echo $model->id ?>" data-width="100" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    </div>
                </div>
                <p><?php echo $model->detailinfo ?></p>
            </div>
            <div class="galleria">
                <?php $slides = explode(' ', $model->largeimg);
                if($slides){
                for($i = 0; $i < sizeOf($slides) - 1; $i++){
                    ?>
                    <?= \yii\helpers\Html::img('@web/images/'. $slides[$i]) ?>
                <?php }} ?>
            </div>
            <hr>

            <div class="fb-comments" data-href="http://localhost/VietvietTravel/VietvietTravel/web/index.php?r=tour%2Fshow-detail&id=<?php echo $model->id ?>" data-width="100%" data-numposts="5"></div>
            <div class="related-tour">
                <h4>Related Tours</h4>
                <div class="thumb-contain">
                    <?php foreach($related as $tour){
                        if($tour->id != $model->id){
                    ?>
                            <div class="thumbnail">
                                <div class="row">
                                    <div class="col-md-5 hover-tour">
                                        <a href="<?php echo \yii\helpers\Url::to(['tour/show-detail', 'id' => $tour->id]); ?>">

                                            <?= \yii\helpers\Html::img('@web/images/'. $tour->smallimg, ['alt' => 'Tour']) ?>
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
                    <?php }} ?>
                </div>
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

<?php
$js = <<<JS
if (Galleria) {
                //Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
                Galleria.run('.galleria', {
                    autoplay: 3000,
                    transition: 'fade',
                    imageCrop: true
                });
            }
JS;
$this->registerJs($js);
?>