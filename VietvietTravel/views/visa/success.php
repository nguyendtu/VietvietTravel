<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<h3>Visa Information</h3>
<?=
    DetailView::widget([
        'model' => $model,
    ]);
?>
<h3>Visa member Information</h3>
<?php
    foreach($visaDetails  as $member){
        echo DetailView::widget([
            'model' => $member,
        ]);
    }
?>

<h3 class="text-center text-success">Vietnam Visa on arrival successfully</h3>
