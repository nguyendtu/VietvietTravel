<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model app\models\Infocompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="infocompany-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'layout' => 'horizontal']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <div class="img-logo">

    </div>

    <div class="margin-top-1">
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'license')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zalo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'yahoo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'viber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map')->textarea(['maxlength' => false]) ?>

    <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="view-map"><?= $model->map ?></div>
        </div>
    </div>

        <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <iframe id="video" <?php if($model->video){ ?> src="<?=$model->video?>" <?php } ?> width="100%" height="400"></iframe>
        </div>
    </div>


        <div class="margin-top-1">
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
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
                                    var smallimg = document.getElementById("infocompany-logo");
                                    smallimg.value = "";
                                    var files = data.result.files;
                                    for(var i = 0; i < files.length; i++){
                                        var name = files[i].name.split(" ");
                                        name = name.join("_");
                                        smallimg.value = name;
                                    }

                                    $(".template-download.fade.in td > .preview img").attr("src", "/images/" + smallimg.value);
                                    console.log($(".template-download.fade.in td > .preview img").attr("src"));
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploaddestroy' => 'function(e, data){
                                    var name = data.url.substr(data.url.lastIndexOf("=") + 1, data.url.length);
                                    var smallimg = document.getElementById("infocompany-logo");
                                    smallimg.value = "";
                                }',
        ],
    ]);
    ?>
</div>



<?php
$url = \yii\helpers\Url::to(['file-upload/delete']);
$js = <<<JS
    var name = $('#infocompany-logo').attr('value');
    var tr = document.createElement("tr");
    tr.setAttribute(
        'class', 'template-download fade in'
    );
    var td1 = document.createElement("td");
    var spanPreview = document.createElement("span");
    spanPreview.setAttribute("class", "preview");
    var aInPreview = document.createElement("a");
    aInPreview.setAttribute('href', '/images/' + name);
    aInPreview.setAttribute('title', name);
    aInPreview.setAttribute('download', name);
    aInPreview.setAttribute('data-gallery', "");
    var img = document.createElement("img");
    img.setAttribute('src', '/images/' + name);
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
?>

<?php
$url = \yii\helpers\Url::to(['file-upload/delete']);
$js = <<<JS
var blur = function(){
    alert($("#infocompany-video").val());
}

$("#w0").on("blur", "#infocompany-video", function(e){
    var value = e.target.value.replace("watch?", "").replace("=", "/");
    e.target.value = value;
    $("#video").attr("src", value);
});

JS;
$this->registerJs($js);
?>
