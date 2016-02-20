<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HotelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-index">

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
                <option value="">All</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
        </li>
    </ul>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hotel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            ],
            // 'id',
            'name',
            'star',
            [
                'attribute' => 'id_location',
                'value' => 'location.name',
            ],
            'address',
            // 'price',
            // 'briefinfo:ntext',
            // 'detailinfo:ntext',
            // 'smallimg',
            // 'largeimg',
            // 'regdate',
            'editdate',
            // 'status',
            // 'hot',
            [
                'attribute' => 'status',
                'headerOptions' => ['class' => 'sr-only'],
                'filterOptions' => ['class' => 'sr-only'],
                'contentOptions' => ['class' => 'sr-only'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>


<?php
$url = yii\helpers\Url::to(['hotel/index']);
if(isset($_GET['HotelSearch']['status'])){
    $status = $_GET['HotelSearch']['status'];
}else{
    $status = "";
}
$js = <<<JS
$(document).ready(function(){
    var keys;
    function gotoRecycleBin(){
        $.post('index.php?r=hotel/recycle-bin', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w0").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
                }
            }else{
                alert("error");
            }
        });
    }
    function deleteHotel(){
        $.post('index.php?r=hotel/delete-multi-hotel', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w0").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
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
        keys = $('#w0').yiiGridView('getSelectedRows');
        console.log(keys);
    });
    $('#status').change(function(){
        $('[name="HotelSearch[status]"]').val(event.target.value).change();
        $('#status').val($('[name="HotelSearch[status]"]').val());
    });

    $('#tasks').change(function(){
        if(event.target.value == "recycle-bin"){
            gotoRecycleBin();
        }else{
            deleteHotel();
        }
        $('#tasks').val("");
    });
});
JS;

$this->registerJs($js);
?>