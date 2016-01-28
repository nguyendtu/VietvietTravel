<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */

$this->title = 'Create Visa';
$this->params['breadcrumbs'][] = ['label' => 'Visas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="visa-create">
    <div class="main-content">
        <h3 class="thumb-caption"><?= Html::encode($this->title) ?></h3>

        <?= $article->detailinfo ?>

        <div class="center">
            <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#book_tour">
                Vietnam visa on arrival
            </button>
        </div>

        <div class="modal fade" id="book_tour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">VISA</h4>
                        <p class="note"><em>* indicates a required field</em></p>
                    </div>
                    <div class="modal-body">

                            <?= $this->render('_form', [
                                'model' => $model,
                                'visaDetails' => $visaDetails,
                            ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>