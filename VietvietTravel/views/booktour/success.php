<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php
if($model) {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fullname',
            'email',
            'phone',
            'nation',
            [
                'label' => 'No. of adults',
                'value' => $model->nadults == 1 ? $model->nadults . " person" : $model->naduls . " persons",
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
                'label' => 'Went with us before?',
                'value' => $model->usebefore ? "Yes" : "No",
            ],
            [
                'label' => 'Receive our newsletters?',
                'value' => $model->reciveinfo ? "Yes" : "No",
            ],
            'paymethod',
            'knwthrough',
        ],
    ]);

    echo "<h3 class='text-center text-success'>BookTour Successfully</h3>";
}
?>