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
        'attributes' => [
            'fullname',
            'email',
            'phone',
            'nation',
            [
                'label' => 'No. of adults',
                'value' => $model->nadults == 1 ? $model->nadults . " person" : $model->nadults . " persons",
            ],
            'listname',
            [
                'label' => 'Do you have any kids in your group?',
                'value' => $model->child == 1 ? "Yes" : "No",
            ],
            'childinfo',
            [
                'label' => 'Do you need our visa service?',
                'value' => $model->visa? "Yes": "No",
            ],
            'depdate',
            'idea:html',
            [
                'label' => 'usebefore',
                'value' => $model->usebefore ? "Yes" : "No",
            ],
            [
                'label' => 'reciveinfo',
                'value' => $model->reciveinfo ? "Yes" : "No",
            ],
            'paymethod',
            'knwthrough',
        ],
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
