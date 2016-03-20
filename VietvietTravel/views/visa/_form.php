<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="visa-form">

    <?php $form = ActiveForm::begin([
        //'action' => ['visa/create'],
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

    <?= $form->field($model, 'visatype')->dropDownList([
        '' => 'Select visa type',
        '1' => '1 month single',
        '2' => '3 month single',
        '3' => '1 month multiple',
        '4' => '3 month multiple',
    ]) ?>

    <?php Pjax::begin() ?>
    <?= $this->render('../visadetail/visadetail', [
        'visaDetails' => $visaDetails,
        'form' => $form,
        'id' => $model->id,
    ]) ?>
    <?php Pjax::end() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status', ['options' => ['class' => 'sr-only']])->textInput(['value' => 0]) ?>

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
        <label for="" class="label-control col-sm-2"></label>
        <div class="col-sm-7">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'visaSubmit']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js = <<<JS
    $('#visa-numapply').change(function(e){
        var href = $('#change_num_appply').attr('href');
        $('#change_num_appply').attr('href', href + e.target.value);
        var href = $('#change_num_appply').attr('href');
        $('#change_num_appply').click();
    });
JS;
$this->registerJs($js);
?>

