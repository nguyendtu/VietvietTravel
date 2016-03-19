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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                <option value=" ">All</option>
                <option value="1" selected="selected">Active</option>
                <option value="0">Deactive</option>
            </select>
        </li>
    </ul>

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
            [
                'attribute' => 'smallimg',
                'format' => 'image',
                'value' => function($model){
                    return '@web/images/' . $model->smallimg;
                }
            ],
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
            [
                'attribute' => 'hot',
                'value' => function($model){
                    $hot = [
                        '0' => 'Không hot',
                        '1' => 'Vị trí trên',
                        '2' => 'Vị trí dưới',
                    ];

                    return $hot[$model->hot];
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                /*'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $url = '/tour/show-detail/' . $model->id;
                        return Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-eye-open']), $url, ['target' => '_blank']);
                    },
                ],*/
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url ='/tour/show-detail/' . $model->id;

                        return $url;
                    }elseif ($action === 'update') {
                        $url ='/tour/update/' . $model->id;

                        return $url;
                    }else{
                        $url ='/tour/delete/' . $model->id;

                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
<?php
$url = yii\helpers\Url::to(['tour/index']);
if(isset($_GET['TourSearch']['status'])){
    $status = $_GET['TourSearch']['status'];
}else{
    $status = null;
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

    if(typeof '$status' != null){
        var options = $('#status').find('option');
        for(var i = 0; i < options.length; i++){
            if(options[i].value == '$status'){
                options[i].setAttribute("selected", "selected");
            }
        }
    }
    $('[name="selection[]"]').click(function(){
        keys = $('#w1').yiiGridView('getSelectedRows');
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