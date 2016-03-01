<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Infocompany */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Infocompanies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="infocompany-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'logo',
            'address',
            'mobile',
            'tel',
            'email:email',
            'license',
            'fax',
            'website',
            'facebook',
            'skype',
            'zalo',
            'yahoo',
            'viber',
            'map',
            'video',
        ]
    ]) ?>

</div>
