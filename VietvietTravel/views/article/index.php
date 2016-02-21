<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::button('Delete Article', ['class' => 'btn btn-danger', 'id' => 'delete_article']) ?>
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
                ],
            ],
            // 'id',
            [
                'attribute' => 'smallimg',
                'content' => function($model){
                    return "<img src='images/". $model->smallimg ."'></img>";
                },
                'format' => 'image',
                'options' => [
                    'width' => '100px',
                ]
            ],
            'title',
            [
                'attribute' => 'type',
                'value' => 'tourtype.name',
                'options' => [
                    'width' => '200px',
                ],
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->all(), 'id', 'name'),
            ],
            'briefinfo:ntext',

            // 'detailinfo:ntext',
            // 'regdate',
            // 'editdate',
            // 'id_user',
            // 'hot',
            [
                'attribute' => 'status',
                'value' => 'status',
                'filter' => [
                    '1' => 'Active',
                    '0' => 'Deactive',
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php
$js = <<<JS
$(document).ready(function(){
    var keys;
    function deleteArticle(){
        $.post('index.php?r=article/delete-multi-article', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w0").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
                }
            }else{
                alert("error");
            }
        });
    }

    $('[name="selection[]"]').click(function(){
        keys = $('#w0').yiiGridView('getSelectedRows');
    });

    $('#delete_article').click(function(){
        alert('abc');
        deleteArticle();
    });
});
JS;

$this->registerJs($js);
?>