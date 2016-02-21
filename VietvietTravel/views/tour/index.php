<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TourSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tours';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tour-index">
    <a id="filter-status" href="" class="sr-only"></a>

    <ul class="tour-head-control">
        <li>
            <p>Tasks</p>
            <select name="Tasks" id="tasks" class="form-control">
                <option selected="selected"></option>
                <option value="recycle-bin">Recycle Bin</option>
                <option value="delete">Delete</option>
            </select>
        </li>
        <li>
            <p>Status</p>
            <select name="Status" id="status" class="form-control">
                <option value="" <?php if(!isset($_GET['TourSearch']['status'])) echo "'selected'=selected"; ?>>All</option>
                <option value="1" <?php if(isset($_GET['To urSearch']['status']) && $_GET['TourSearch']['status'] == 1) echo "'selected'=selected"; ?>>Active</option>
                <option value="0" <?php if(isset($_GET['TourSearch']['status']) && $_GET['TourSearch']['status'] == 0) echo "'selected'=selected"; ?>>Deactive</option>
            </select>
        </li>
    </ul>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => [
                    'class' => 'sr-only',
                ]
                // you may configure additional properties here
            ],
            //'id',
            'name',
            'code',
            [
                'attribute' => 'id_tourtype',
                'value' => 'tourtype.name',
                'filter' => \yii\helpers\ArrayHelper::map(
                    \app\models\Tourtype::find()->all(), 'id', 'name'
                ),
                'options' => [
                    'width' => '200px'
                ]
            ],
            'length',
            'startfrom',
            'keyword',
            // 'price',
            // 'briefinfo:ntext',
            // 'detailinfo:ntext',
            // 'smallimg',
            // 'largeimg',
            // 'regdate',
            'editdate',
            // 'hot',
            // 'status',
            [
                'attribute' => 'status',
                'value' => 'status',
                //'visible' => false,
                'contentOptions' => [
                    'class' => 'sr-only',
                ],
                'label' => '',
                'headerOptions' => [
                    'class' => 'sr-only',
                ],
                'filterOptions' => [
                    'class' => 'sr-only'
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
<?php
$url = yii\helpers\Url::to(['tour/index']);
if(isset($_GET['TourSearch']['status'])){
    $status = $_GET['TourSearch']['status'];
}else{
    $status = "";
}
$js = <<<JS
$(document).ready(function(){
    var keys;
    function gotoRecycleBin(){
        $.post('index.php?r=tour/recycle-bin', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w1").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
                }

            }else{
                alert("error");
            }
        });
    }
    function deleteTour(){
        $.post('index.php?r=tour/delete-multi-tour', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w1").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
                }
            }else{
                alert("error");
            }
        });
    }
    var options = $('#status').find('option');
    for(var i = 0; i < options.length; i++){
        if(options[i].value == '$status'){
            options[i].setAttribute("selected", "selected");
        }
    }
    $('[name="selection[]"]').click(function(){
        keys = $('#w1').yiiGridView('getSelectedRows');
        console.log(keys);
    });
    $('#status').change(function(){
        $('[name="TourSearch[status]"]').val(event.target.value).change();
        $('#status').val($('[name="TourSearch[status]"]').val());
    });

    $('#tasks').change(function(){
        if(event.target.value == "recycle-bin"){
            gotoRecycleBin();
        }else{
            deleteTour();
        }
        $('#tasks').val("");
    });
});
JS;

$this->registerJs($js);
?>