<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Booktour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booktour-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-horizontal',
            'id' => 'book_tour',
        ],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-7\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2'],
        ],

    ]); ?>
    <?= $form->field($model, 'id_tour', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true]) ?>
    <h4>Contact Information</h4>
    <?= $form->field($model, 'fullname', [
        'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='1'>Mr</option>
    <option value='2'>Ms</option>
    <option value='3'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textInput(['maxlength' => true])->hint("*") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <h4>Itinerary Information</h4>

    <?= $form->field($model, 'nadults')->dropDownList([
        '1' => '1 person',
        '2' => '2 person',
        '3' => '3 person',
        '4' => '4 person',
        '5' => '5 person',
        '' => '>> 5 person',
    ]) ?>

    <?= $form->field($model, 'listname', [
        'template' => "{label}\n<div class=\"col-md-7\" >firstname - middlename - lastname \n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textarea() ?>

    <?= $form->field($model, 'child')->radioList(
        [ 0 => 'No', 1 => 'Yes',],
        [
            'item' => function($index, $label, $name, $checked, $value) {

                $return = '<label class="modal-radio" style="margin-right: 50px;">';
                $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                $return .= '';
                $return .= '<span>' . ucwords($label) . '</span>';
                $return .= '</label>';

                return $return;
            }
    ]) ?>

    <?= $form->field($model, 'childinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'depdate')->widget(DatePicker::className(),[
        'name' => 'depdate',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d-m-Y'),
        'options' => ['placeholder' => date('d-m-Y')],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'visa')->textInput() ?>

    <?= $form->field($model, 'idea', [
        'template' => "<div class=\"col-md-12\">{label}</div><div class=\"col-md-12\">\n{input}\n{hint}\n{error}</div>",
    ])->textarea([
        'id' => "mytextarea",
    ]) ?>

    <h4>Additional Information</h4>

    <?= $form->field($model, 'usebefore')->checkbox()->label('Went with us before?') ?>

    <?= $form->field($model, 'reciveinfo')->checkbox()->label('Receive our newsletters?') ?>

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



    <div class="form-group form-footer">

        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
