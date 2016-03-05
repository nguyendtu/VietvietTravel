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

                            <?= \yii\helpers\Html::img('@web/images/'. $model->smallimg, ['alt' => 'hotel']) ?>
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
                    <?= \yii\helpers\Html::img('@web/images/'. $slides[$i]) ?>
                <?php } ?>
            </div>
            <div class="hotel-info">
                <?php echo $model->detailinfo ?>
            </div>
            <div class="related-hotel">
                <div class="row">
                    <?php echo \yii\widgets\ListView::widget([
                    'dataProvider' => $related,
                    'summary' => '',
                    'itemView' => '_show',
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS
if (Galleria) {
                Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
                    Galleria.run('.galleria', {
                        autoplay: 3000,
                        transition: 'fade',
                        imageCrop: true
                    });

            }
JS;
$this->registerJs($js);
?>
