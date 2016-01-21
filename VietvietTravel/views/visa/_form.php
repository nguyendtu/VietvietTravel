<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
if(isset($_GET['num'])) {
    $num = $_GET['num'];
    $js = <<<JS
    var b = $('#visa-numapply').find($('option'));
    for(var i = 0; i < b.length; i++){
        if(b[i].value == $num){
            b[i].selected = "selected";
        }
        console.log(b[i].value);
    }
JS;
    $this->registerJs($js);
}
?>

<div class="visa-form">

    <?php $form = ActiveForm::begin([
        'action' => ['visa/create'],
        //'enableClientValidation' => false,
        'options' => [
            'class' => 'form-horizontal',
            'id' => 'visa',
        ],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-7\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2'],
        ],

    ]); ?>

    <h4>Contact Information</h4>

    <?= $form->field($model, 'fullname', [
        'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='1'>Mr</option>
    <option value='2'>Ms</option>
    <option value='3'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textInput(['maxlength' => true])->hint("*") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'required']) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <h4>Visa Detail</h4>

    <?= $form->field($model, 'numapply')->dropDownList([
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
    ]) ?>

    <?= $form->field($model, 'processtime')->dropDownList([
        'normal' => 'Normal (36 hours to 2 working days)',
        'urgent' => 'Urgent (within 1 working day',
    ]) ?>

    <?php echo $model->numapply; ?>

    <?= $form->field($model, 'visatype')->dropDownList([
        '' => 'Select visa type',
        '1' => '1 month single',
        '2' => '3 month single',
        '3' => '1 month multiple',
        '4' => '3 month multiple',
    ]) ?>

    <?= $this->render('../visadetail/visadetail', [
        'visaDetails' => $visaDetails,
        'form' => $form,
    ]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'regdate')->widget(DatePicker::className(),[
        'name' => 'depdate',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d-m-Y'),
        'options' => ['placeholder' => date('d-m-Y')],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <h4>Additional Information</h4>

    <?= $form->field($model, 'usebefore')->checkbox()->label('Went with us before?') ?>

    <?= $form->field($model, 'receiveinfo')->checkbox()->label('Receive our newsletters?') ?>

    <?= $form->field($model, 'paymethod')->dropDownList([
        "Credit card" => "Credit card",
        "Bank transfer" => "Bank transfer",
        "Cash" => "Cash",
        "Traveler cheque" => "Traveler cheque",
        "Bank draft" => "Bank draft",
        "VCB ATM" => "VCB ATM",
        "Others" => "Others",
    ]) ?>

    <?= $form->field($model, 'knwthrough')->dropDownList([
        "Search Google" => "Search Google",
        "Search Yahoo" => "Search Yahoo",
        "Search MSN" => "Search MSN",
        "Search Altavista" => "Search Altavista",
        "TripAdvisor" => "TripAdvisor",
        "Frequent booking" => "Frequent booking",
        "Newspaper" => "Newspaper",
        "Links Websites" => "Links Websites",
        "Friend's Recommendation" => "Friend's Recommendation",
        "Words of Mouth" => "Words of Mouth",
        "Travel Agent" => "Travel Agent",
        "Partner Hotel" => "Partner Hotel",
        "Travel Magazine, News" => "Travel Magazine, News",
        "Guide Book" => "Guide Book",
        "Just Cruising" => "Just Cruising",
        "Others" => "Others",
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'visaSubmit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
    var fullName = $('#visa-fullname').attr("value")? $('#visa-fullname').attr("value"): "";
    var email = $('#visa-email').attr("value")? $('#visa-email').attr("value"): "";
    var mobile = $('#visa-mobile').attr("value")? $('#visa-mobile').attr("value"): "";
    var nation = $('#visa-nation').attr("value")? $('#visa-nation').attr("value"): "";
    var processTime = $('#visa-processtime').attr("value")? $('#visa-processtime').attr("value"): "";
    var visaType = $('#visa-visatype').attr("value")? $('#visa-visatype').attr("value"): "";
    var useBefore = $('#visa-usebefore').attr("value")? $('#visa-usebefore').attr("value"): "";
    var receiveInfo = $('#visa-receiveinfo').attr("value")? $('#visa-receiveinfo').attr("value"): "";
    var payMethod = $('#visa-paymethod').attr("value")? $('#visa-paymethod').attr("value"): "";
    var knwThrough = $('#visa-knwthrough').attr("value")? $('#visa-knwthrough').attr("value"): "";
    $('#visa-fullname').keydown(function(e){
        var key = e.keyCode;
        if( key == 8 || key == 46){
            fullName = fullName.substr(0, fullName.length - 1);
        }else{
            fullName += String.fromCharCode(key);
        }
    });
    $('#visa-email').keypress(function(e){
        email += String.fromCharCode(e.keyCode);
    });
    $('#visa-mobile').keypress(function(e){
        mobile += String.fromCharCode(e.keyCode);
    });
    $('#visa-nation').keypress(function(e){
        nation += String.fromCharCode(e.keyCode);
    });
    $('#visa-processtime').change(function(e){
        processTime = e.target.value;
    });
    $('#visa-visatype').change(function(e){
        visaType = e.target.value;
    });
    $('#visa-paymethod').change(function(e){
        payMethod = e.target.value;
    });
    $('#visa-knwthrough').change(function(e){
        knwThrough = e.target.value;
    });
    $('#visa-usebefore').click(function(e){
        if(e.target.checked){
            useBefore = 1;
        }else{
            useBefore = 0;
        }
    });
    $('#visa-receiveinfo').click(function(e){
        if(e.target.checked){
            receiveInfo = 1;
        }else{
            receiveInfo = 0;
        }
    });

    $('#visa-numapply').change(function(e){
        /*visa.push(fullName);*/
        /*visa.push(email);
        visa.push(mobile);
        visa.push(nation);
        visa.push(processTime);
        visa.push(visaType);
        visa.push(useBefore);
        visa.push(receiveInfo);
        visa.push(payMethod);
        visa.push(knwThrough);*/
        visa = [fullName, email, mobile, nation, processTime, visaType, useBefore, receiveInfo, payMethod, knwThrough];

        var href = $('#change_num_appply').attr('href');
        $('#change_num_appply').attr('href', href + e.target.value + '&visa=' + visa);
        var href = $('#change_num_appply').attr('href');
        console.log(href);
        $('#change_num_appply').click();
            console.log(visa);

    });
JS;
$this->registerJs($js);
//$this->registerJsFile('@web/js/activeform.js');
?>