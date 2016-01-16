<?php
use yii\helpers\Html;

$this->title = 'About us';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-index">
    <div class="main-content">
        <h3 class="thumb-caption"><?= Html::encode($this->title) ?></h3>

        <div>
            <?= $model->detailinfo ?>
        </div>
    </div>
</div>