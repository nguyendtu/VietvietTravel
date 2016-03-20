<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
?>

<div class="booktour-form">

    <?php $form = ActiveForm::begin([
        'action' => ['booktour/booktour'],
        'options' => [
            'class' => 'form-horizontal',
            'id' => 'book_tour',
        ],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-7\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2'],
        ],

    ]); ?>
    <?= $form->field($booktour, 'id_tour', ['options' => ['class' => 'sr-only']])->textInput(['maxlength' => true, 'value' => $model->id]) ?>
    <h4>Contact Information</h4>
    <?= $form->field($booktour, 'fullname', [
        'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='Mr'>Mr</option>
    <option value='Ms'>Ms</option>
    <option value='Mrs'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textInput(['maxlength' => true])->hint("*") ?>

    <?= $form->field($booktour, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($booktour, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($booktour, 'nation')->textInput(['maxlength' => true]) ?>

    <h4>Itinerary Information</h4>

    <?= $form->field($booktour, 'nadults')->dropDownList([
        '1' => '1 person',
        '2' => '2 person',
        '3' => '3 person',
        '4' => '4 person',
        '5' => '5 person',
        '' => '>> 5 person',
    ]) ?>

    <?= $form->field($booktour, 'listname', [
        'template' => "{label}\n<div class=\"col-md-7\" >firstname - middlename - lastname \n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textarea() ?>

    <?= $form->field($booktour, 'child')->radioList(
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

    <?= $form->field($booktour, 'childinfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($booktour, 'depdate', ['options' => ['class' => 'sr-only']])->textInput(['value' => date('Y-m-d')])?>

    <?= $form->field($booktour, 'visa')->radioList(
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

    <?= $form->field($booktour, 'idea', [
        'template' => "<div class=\"col-md-12\">{label}</div><div class=\"col-md-12\">\n{input}\n{hint}\n{error}</div>",
    ])->textarea([
        'id' => "mytextarea",
    ]) ?>

    <h4>Additional Information</h4>

    <?= $form->field($booktour, 'usebefore')->checkbox()->label('Went with us before?') ?>

    <?= $form->field($booktour, 'reciveinfo')->checkbox()->label('Receive our newsletters?') ?>

    <?= $form->field($booktour, 'paymethod')->dropDownList([
        "Credit card" => "Credit card",
        "Bank transfer" => "Bank transfer",
        "Cash" => "Cash",
        "Traveler cheque" => "Traveler cheque",
        "Bank draft" => "Bank draft",
        "VCB ATM" => "VCB ATM",
        "Others" => "Others",
    ]) ?>

    <?= $form->field($booktour, 'knwthrough')->dropDownList([
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

    <?= $form->field($model, 'status', ['options' => ['class' => 'sr-only']])->textInput(['value' => 0]) ?>


    <div class="form-group form-footer">

        <?= Html::submitButton($booktour->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
