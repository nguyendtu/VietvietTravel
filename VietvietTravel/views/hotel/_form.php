<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Hotel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotel-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <div class="row">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'id_location')->dropDownList(
            \yii\helpers\ArrayHelper::map($location->find()->all(), 'id', 'name'), ['prompt' => '-- Choose Location --']) ?>
        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'editdate')->widget(DatePicker::className(),[
            'name' => 'regdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>
        <?= $form->field($model, 'hot')->checkbox() ?>
        <?= $form->field($model, 'star')->dropDownList([
            '1' => '1 Sao',
            '2' => '2 Sao',
            '3' => '3 Sao',
            '4' => '4 Sao',
            '5' => '5 Sao',
        ], ['prompt' => '-- Chọn số sao']) ?>
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'regdate')->widget(DatePicker::className(),[
            'name' => 'regdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>
        <?= $form->field($model, 'status')->dropDownList([
            '1' => 'Active',
            '0' => 'DeActive',
        ]) ?>
        <?= $form->field($model, 'phone')->textInput() ?>
        <div class="col-xs-12">
            <?= $form->field($model, 'smallimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

            <div class="margin-top-1">
                <?= $form->field($model, 'largeimg')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                <div class="margin-top-1">
                    <?= $form->field($model, 'briefinfo')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'detailinfo')->textarea(['rows' => 6, 'id' => 'mytextarea']) ?>
                    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="margin-top-2">
            <label for="" class="label-control col-sm-3"></label>
            <div class="col-sm-6">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div class="smallUpload">
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
                                    var smallimg = document.getElementById("hotel-smallimg");
                                    smallimg.value = "";
                                    var files = data.result.files;
                                    for(var i = 0; i < files.length; i++){
                                        var name = files[i].name.split(" ");
                                        name = name.join("_");
                                        smallimg.value = name;
                                    }
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    var smallimg = document.getElementById("hotel-smallimg");
                                    smallimg.value = "";
                                }',
        ],
    ]);
    ?>
</div>

<div class="largeUpload">
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
                                    var largeimg = document.getElementById("hotel-largeimg");
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
                                    var largeimg = document.getElementById("hotel-largeimg");
                                    for(var i = 0; i < files.length; i++){
                                        largeimg.value = largeimg.value.replace(name, " ");
                                    }
                                }',
        ],
    ]);
    ?>
</div>

<?php
$url = \yii\helpers\Url::to(['file-upload/delete']);
$js = <<<JS
    var name = $('#hotel-smallimg').attr('value');
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
    //td3.appendChild(span);
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
    spanInBtn.innerHTML = " Delete";
    btn.appendChild(spanInBtn);

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
    var name = $('#hotel-largeimg').attr('value');
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
        td4.appendChild( i);
        tr.appendChild(td4);

        $('#largeimg-form .files').append(tr);
        }
    }
JS;
$this->registerJs($js);
?>