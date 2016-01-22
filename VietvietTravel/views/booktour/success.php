<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php
if($model) {
    echo DetailView::widget([
        'model' => $model,
    ]);

    echo "<h3 class='text-center text-success'>BookTour Successfully</h3>";
}
?>