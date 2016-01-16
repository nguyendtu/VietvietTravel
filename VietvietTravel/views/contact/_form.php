<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

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

    <h3>Contact Infomation</h3>
    <?= $form->field($model, 'fullname',[
        'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='Mr'>Mr</option>
    <option value='Ms'>Ms</option>
    <option value='Mrs'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
    ])->textInput(['maxlength' => true])->hint("*") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message', [
        'template' => "<div class=\"col-md-12\">{label}</div><div class=\"col-md-12\">\n{input}\n{hint}\n{error}</div>",
    ])->textarea([
        'id' => "mytextarea",
    ]) ?>

    <h3>Additional Information</h3>
    <?= $form->field($model, 'usebefore')->checkbox()->label('Went with us before?') ?>

    <?= $form->field($model, 'receiveinfo')->checkbox()->label('Receive our newsletters?') ?>

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

    <?= $form->field($model, 'regdate')->widget(DatePicker::className(), [
        'name' => 'regdate',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'value' => date('d-m-Y'),
        'options' => ['placeholder' => date('d-m-Y')],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-left: 10px']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
