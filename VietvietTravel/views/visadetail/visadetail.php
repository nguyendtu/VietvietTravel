<?php
use yii\helpers\Html;
use kartik\date\DatePicker;
?>

<!-- visa detail info -->
<?= Html::a('change num apply', ['visa/create', 'num' => ''], ['id' => 'change_num_appply', 'class' => 'sr-only']) ?>
<?php $i = 1; foreach($visaDetails as $visaDetail){ ?>
    <img src="images/person.png" alt="Person" style="width: 100px">
    <div class="visa-detail">
        <?= $form->field($visaDetail, '[' .$i . ']fullname', [
            'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='1'>Mr</option>
    <option value='2'>Ms</option>
    <option value='3'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
        ])->textInput(['maxlength' => true])->hint("*") ?>

        <?= $form->field($visaDetail, '[' .$i . ']nation')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']idpassport')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']birthday')->widget(DatePicker::className(),[
            'name' => 'depdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

        <?= $form->field($visaDetail, '[' .$i . ']expire')->widget(DatePicker::className(),[
            'name' => 'depdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

        <?= $form->field($visaDetail, '[' .$i . ']flightdetail')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']arrivaldate')->widget(DatePicker::className(),[
            'name' => 'depdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

        <?= $form->field($visaDetail, '[' .$i . ']exitdate')->widget(DatePicker::className(),[
            'name' => 'depdate',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => date('d-m-Y')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]) ?>

        <?= $form->field($visaDetail, '[' .$i . ']portarrival')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']purposevisit')->textInput() ?>

    </div>
    <?php $i++; } ?>
<!-- end visa detail info -->
<?php
    $js = <<<JS
    var selector = "";
    function validate(selector, message){
        $(selector).change(function(e){
            if(e.target.value.length == 0){
                $(this).parent().parent().removeClass("has-success");
                $(this).parent().parent().addClass("has-error");
                $(this).parent().parent().find('.help-block').html(message);
            }else{
                $(this).parent().parent().removeClass("has-error");
                $(this).parent().parent().addClass("has-success");
                $(this).parent().parent().find('.help-block').html("");
            }
        }).blur(function(e){
            if(e.target.value.length == 0){
                $(this).parent().parent().removeClass("has-success");
                $(this).parent().parent().addClass("has-error");
                $(this).parent().parent().find('.help-block').html(message);
            }else{
                $(this).parent().parent().removeClass("has-error");
                $(this).parent().parent().addClass("has-success");
                $(this).parent().parent().find('.help-block').html("");
            }
        });
    }
    for(var i = 1; i <= $("#visa-numapply").val(); i++){
        selector = "#visadetail-" + i + "-fullname";
        validate(selector, "Passport's fullname cannot be blank.");
        selector = "#visadetail-" + i + "-nation";
        validate(selector, "Present nationality cannot be blank.");
        selector = "#visadetail-" + i + "-idpassport";
        validate(selector, "Passport number cannot be blank.");

        selector = "#visadetail-" + i + "-birthday-kvdate";
        validate(selector, "Date of birth cannot be blank.");

        selector = "#visadetail-" + i + "-expire-kvdate";
        validate(selector, "Date of exprire cannot be blank.");

        selector = "#visadetail-" + i + "-flightdetail";
        //validate(selector, "");

        selector = "#visadetail-" + i + "-arrivaldate-kvdate";
        //validate(selector, "");

        selector = "#visadetail-" + i + "-exitdate-kvdate";
        //validate(selector, "");

        selector = "#visadetail-" + i + "-portarrival";
        //validate(selector, "");

        selector = "#visadetail-" + i + "-purposevisit";
        //validate(selector, "");
    }
JS;
$this->registerJs($js);
?>
