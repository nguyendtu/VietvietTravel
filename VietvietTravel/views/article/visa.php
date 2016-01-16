<?php
use yii\helpers\Html;
use yii\widgets\Pjax;


$this->title = 'Vietnam visa on arrival';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-index">
    <div class="main-content">
        <h3 class="thumb-caption"><?= Html::encode($this->title) ?></h3>

        <div>
            <?= $model->detailinfo ?>
        </div>

        <?= $this->render('../visa/create', [
            'model' => $visa,
            'visaDetails' => $visaDetails,
        ]) ?>

    </div>
</div>

<?php
$js = <<<JS
    $('#visa-numapply').change(function(e){
        console.log(e.target.value);
        var url = "index.php?r=article/visa";
        $.post(
            url,
            {
                numapply: e.target.value,
            },
            function(data, status){
                for(var i = 0; i < data - 1; i++){
                    var a = $('.visa-detail').clone();
                    a.insertBefore($('#end_visa'));
                }
            }
        );
    });
JS;

$this->registerJs($js);
?>