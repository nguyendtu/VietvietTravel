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
                    $img = \yii\helpers\Html::img('@web/images/'. $model->smallimg);
                    return $img;
                },
                'format' => 'image',
                'options' => [
                    'width' => '17%',
                ]
            ],
            [
                'attribute' => 'title',
                'content' => function($model){
                    return Html::a(''. $model->title, ['/article/' . implode('-', explode(' ', $model->title))]);
                },
                'options' => [
                    'width' => '20%',
                ]
            ],
            [
                'attribute' => 'type',
                'value' => 'tourtype.name',
                'options' => [
                    'width' => '15%',
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
                'options' => [
                    'width' => '150px',
                ],
                'value' => function($model){
                    return $model->status? "Active" : "Deactive";
                },
                'filter' => [
                    '1' => 'Active',
                    '0' => 'Deactive',
                ]
            ],
            [
                'attribute' => 'hot',
                'options' => [
                    'width' => '7%',
                ],
                'value' => function($model){
                    return $model->hot == 1 ? 'Hot' : '';
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => [
                    'width' => '7%',
                ]
            ],
        ],
    ]); ?>

</div>
<?php
$js = <<<JS
$(document).ready(function(){
    var keys,
        deleteArticle = function deleteArticle(){
        $.post('/article/delete-multi-article', {keys: keys}, function(data, status){
            if(status){
                for(var iKey = 0; iKey < keys.length; iKey++){
                    $("#w0").find("[ data-key=" + keys[iKey] + "]").attr("class", "sr-only");
                }
            }else{
                alert("error");
            }
        });
    }

    $('.article-index').on("click", '[name="selection[]"]', function(){
        keys = $('#w0').yiiGridView('getSelectedRows');

        console.log(keys);
    })

    $('#delete_article').click(function(){
        deleteArticle();
    });
});
JS;

$this->registerJs($js);
?>