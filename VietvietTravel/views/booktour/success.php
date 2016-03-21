<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php
if($model) {
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'TOUR',
                'value' => $model->tour->name,
            ],
            'fullname',
            'email:html',
            'phone:html',
            'nation:html',
            'nadults:html',
            'listname:html',
            'child:html',
            'childinfo:html',
            'depdate:html',
            'idea:html',
            'visa:html',
            'usebefore:html',
            'reciveinfo:html',
            'paymethod:html',
            'knwthrough:html',

        ],
    ]);

    echo "<h3 class='text-center text-success'>BookTour Successfully</h3>";
}
?>