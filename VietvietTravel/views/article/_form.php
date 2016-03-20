<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'action' => 'article/create',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Tourtype::find()->all(), 'id', 'name'), ['prompt' => '-- Choose a tourtype --']
    ) ?>

    <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')])?>
    <?= $form->field($model, 'editdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')])?>

    <?= $form->field($model, 'hot')->checkbox() ?>

    <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <div class="margin-top-1">
    <?= $form->field($model, 'id_user', ['options' => ['class' => 'sr-only']])->textInput(['value' => Yii::$app->user->identity->id]) ?>
    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'DeActive',
    ]) ?>

    <div class="form-group">
        <label for="" class="label-control col-sm-3"></label>
        <div class="col-sm-9">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<div class="smallUpload" style="top: -755px;">
    <?= FileUploadUI::widget([
        'model' => $small,
        'attribute' => 'fileUpload',
        'url' => ['file-upload/upload'],
        'gallery' => false,
        'options' => ['id' => 'smallimg'],
        'fieldOptions' => [
            'accept' => 'image/*',
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    var smallimg = document.getElementById("article-smallimg");
                                    smallimg.value = "";
                                    var files = data.result.files;
                                    for(var i = 0; i < files.length; i++){
                                        smallimg.value = files[i].name;
                                    }
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    var smallimg = document.getElementById("article-smallimg");
                                    smallimg.value = "";
                                }',
        ],
    ]);
    ?>
</div>

<?php
$url = \yii\helpers\Url::to(['file-upload/delete']);
$js = <<<JS
    var name = $('#article-smallimg').attr('value');
    var tr = document.createElement("tr");
    tr.setAttribute(
        'class', 'template-download fade in'
    );
    var td1 = document.createElement("td");
    var spanPreview = document.createElement("span");
    spanPreview.setAttribute("class", "preview");
    var aInPreview = document.createElement("a");
    aInPreview.setAttribute('href', 'images/' + name);
    aInPreview.setAttribute('title', name);
    aInPreview.setAttribute('download', name);
    aInPreview.setAttribute('data-gallery', "");
    var img = document.createElement("img");
    img.setAttribute('src', '../../images/' + name);
    aInPreview.appendChild(img);
    spanPreview.appendChild(aInPreview);
    td1.appendChild(spanPreview);
    tr.appendChild(td1);

var td2 = document.createElement("td");
    var pInT2 = document.createElement("p");
    pInT2.setAttribute("class", "name");
    var aInT2 = document.createElement("a");
    aInT2.setAttribute('href', 'images/' + name);
    aInT2.setAttribute('title', name);
    aInT2.setAttribute('download', name);
    aInT2.setAttribute('data-gallery', "");
    aInT2.innerHTML = name;
    pInT2.appendChild(aInT2);
    td2.appendChild(pInT2);
    tr.appendChild(td2);
    var temp = '$url';
    var td3 = document.createElement('td');
    var span = document.createElement("span");
    span.setAttribute("class", "size");
    span.innerHTML = "abc";
    td3.appendChild(span);
    tr.appendChild(td3);
    var td4 = document.createElement("td");
    var btn = document.createElement("button");
    btn.setAttribute("class", "btn btn-danger delete");
    btn.setAttribute("data-type", "POST");
    btn.setAttribute("data-url", temp + "&name=" + name);

    var iInBtn = document.createElement('i');
    iInBtn.setAttribute("class", "glyphicon glyphicon-trash");
    btn.appendChild(iInBtn);
    var spanInBtn = document.createElement("span");
    span.innerHTML = " Delete";
    btn.appendChild(span);

    var i = document.createElement("input");
    i.setAttribute("type", "checkbox");
    i.setAttribute("name", "delete");
    i.setAttribute("value", 1);
    i.setAttribute("class", "toggle");
    td4.appendChild(btn);
    td4.appendChild(i);
    tr.appendChild(td4);

$('#smallimg-form .files').append(tr);
btn.click = function(e){
    console.log(e.target);
}
JS;
$this->registerJs($js);
?>