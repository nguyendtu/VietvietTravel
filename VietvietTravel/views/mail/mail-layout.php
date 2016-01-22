<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>

<?=

    DetailView::widget([
        'model' => $model,
    ]);
?>

<?php
    if(isset($visaDetails)){
        echo "<h3>Visa member information</h3>";

        foreach($visaDetails as $member){
            echo DetailView::widget([
                'model' => $member,
            ]);
        }
    }
?>
