<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$visa = new app\models\Visa();
$visadetail = new app\models\Visadetail();
?>
<div class="main-content">
    <h3 class="thumb-caption"><?php echo $model->title ?></h3>
    <?php echo $model->detailinfo ?>
    <div class="fb-like" data-href="http://localhost/VietvietTravel/VietvietTravel/web/index.php?r=article%2Fdetail&id=<?php echo $model->id ?>" data-width="100" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
    <div class="fb-comments" data-href="http://localhost/VietvietTravel/VietvietTravel/web/index.php?r=article%2Fdetail&id=<?php echo $model->id ?>" data-width="100%" data-numposts="5"></div>
    <?php if($model->title == "Vietnam visa on Arrival"){ ?>
    <div class="order">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#order">
            Vietnam visa on arival order form
        </button>
    </div>

    <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">VISA REQUIREMENTS</h4>
                    <p class="note"><em>* indicates a required field</em></p>
                </div>
                <div class="modal-body">
                    <?= $this->render("../visa/create", [
                        'model' => $visa,
                        'visadetails' => [$visadetail],
                        'num' => 1,
                    ])  ?>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
