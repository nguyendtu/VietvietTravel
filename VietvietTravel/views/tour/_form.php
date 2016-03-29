<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin(['layout'  => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tourtype')->dropDownList(
        \yii\helpers\ArrayHelper::map($tourtype->find()->all(), 'id', 'name'), ['prompt' => '-- Choose a tourtype --']
    ) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'startfrom')->textInput() ?>

    <div class="form-group" id="pr-c">
        <label for="" class="label-control col-md-3"></label>
        <div class="col-md-6">
            <input id="price-contact" type="radio" name="price-type" value="price-contact"> <label for="price-contact">Price Contact</label><br/>
            <input id="price-detail" type="radio" name="price-type" value="price-detail"> <label for="price-detail">Price Detail</label><br/>
            <input id="price" type="radio" name="price-type" value="price" checked> <label for="price">Price</label>
        </div>
    </div>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>
    <?= $form->field($model, 'editdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'hot')->dropDownList([
        '0' => 'No',
        '1' => 'Top Position',
        '2' => 'Bottom Position',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'DeActive',
    ]) ?>

    <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <div class="margin-top-1">
        <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

        <div class="margin-top-1">
            <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>

            <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="margin-top-2">
            <label for="" class="label-control col-sm-3"></label>
            <div class="col-sm-6">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['id' => 'tour-submit', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="smallUpload" style="top: 37%">
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
            'maxFileSize' => 5000000
        ],
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    var smallimg = document.getElementById("tour-smallimg");
                                    smallimg.value = "";
                                    var files = data.result.files;

                                    var name = files[0].name.split(" ");
                                    name = name.join("_");

                                    for(var i = 0; i < files.length; i++){
                                        smallimg.value = name;
                                    }
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    var smallimg = document.getElementById("tour-smallimg");
                                    smallimg.value = "";
                                }',
        ],
    ]);
    ?>
</div>
<div class="largeUpload" style="top: 50%">
    <?= FileUploadUI::widget([
        'model' => $large,
        'attribute' => 'fileUpload',
        'url' => ['file-upload/upload'],
        'gallery' => false,
        'options' => ['id' => 'largeimg'],
        'fieldOptions' => [
            'accept' => 'image/*',
            'multiple' => true,
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    var largeimg = document.getElementById("tour-largeimg");
                                    files = data.result.files;

                                    for(var i = 0; i < files.length; i++){
                                        var name = files[i].name.split(" ");
                                        name = name.join("_");
                                        largeimg.value += name + " ";
                                    }
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    name = name.split("/");
                                    name = name[name.length - 1];
                                    name = name + " ";
                                    var largeimg = document.getElementById("tour-largeimg");
                                    largeimg.value = largeimg.value.replace(name, "");
                                }',
        ],
    ]);
    ?>
</div>

<?php
$url = \yii\helpers\Url::to(['file-upload/delete']);
$js = <<<JS
    var name = $('#tour-smallimg').attr('value');
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
    btn.setAttribute("data-url", temp + "/" + name);

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

$js = <<<JS
    var name = $('#tour-largeimg').attr('value');
    name = name.split(" ");
    var temp = '$url';
    for(var index = 0; index < name.length; index++){
    if(name[index] != ""){
        var tr = document.createElement("tr");
        tr.setAttribute(
            'class', 'template-download fade in'
        );
        var td1 = document.createElement("td");
        var spanPreview = document.createElement("span");
        spanPreview.setAttribute("class", "preview");
        var aInPreview = document.createElement("a");
        aInPreview.setAttribute('href', 'images/' + name[index]);
        aInPreview.setAttribute('title', name[index]);
        aInPreview.setAttribute('download', name[index]);
        aInPreview.setAttribute('data-gallery', "");
        var img = document.createElement("img");
        img.setAttribute('src', '../../images/' + name[index]);
        aInPreview.appendChild(img);
        spanPreview.appendChild(aInPreview);
        td1.appendChild(spanPreview);
        tr.appendChild(td1);

        var td2 = document.createElement("td");
        var pInT2 = document.createElement("p");
        pInT2.setAttribute("class", "name");
        var aInT2 = document.createElement("a");
        aInT2.setAttribute('href', 'images/' + name[index]);
        aInT2.setAttribute('title', name[index]);
        aInT2.setAttribute('download', name[index]);
        aInT2.setAttribute('data-gallery', "");
        aInT2.innerHTML = name[index];
        pInT2.appendChild(aInT2);
        td2.appendChild(pInT2);
        tr.appendChild(td2);

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
        btn.setAttribute("data-url", temp + "/" + name[index]);

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

        $('#largeimg-form .files').append(tr);
        }

    }


JS;
$this->registerJs($js);
?>