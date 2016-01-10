<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Visa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visa-form">

    <?php $form = ActiveForm::begin([
        'action' => ['visa/create'],
        'options' => [
            'class' => 'form-horizontal',
            'id' => 'book_tour',
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

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

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

    <!-- visa detail info -->


    <?php foreach($visadetails as $visadetail){ ?>
        <?= $form->field($visadetail, 'fullname', [
            'template' => "{label}\n<div class=\"col-md-2\"><select name='genderName' id='' class=\"form-control\">
    <option value='1'>Mr</option>
    <option value='2'>Ms</option>
    <option value='3'>Mrs</option>
</select></div><div class=\"col-md-5\" >\n{input}\n</div><div class=\"col-md-3\">\n{hint}\n{error}</div>",
        ])->textInput(['maxlength' => true])->hint("*") ?>

        <?= $form->field($visadetail, 'nation[]')->textInput() ?>

        <?= $form->field($visadetail, 'idpassport[]')->textInput() ?>

        <?= $form->field($visadetail, 'birthday[]')->textInput() ?>

        <?= $form->field($visadetail, 'expire[]')->textInput() ?>

        <?= $form->field($visadetail, 'flightdetail[]')->textInput() ?>

        <?= $form->field($visadetail, 'arrivaldate[]')->textInput() ?>

        <?= $form->field($visadetail, 'exitdate[]')->textInput() ?>

        <?= $form->field($visadetail, 'portarrival[]')->textInput() ?>

        <?= $form->field($visadetail, 'purposevisit[]')->textInput() ?>
    <?php } ?>
    <!-- end visa detail info -->

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'regdate')->textInput() ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$js = <<<JS
    var numapply = document.getElementById('visa-numapply');

    numapply.onchange = function(e){
        var url = "index.php?r=visadetail/create-ajax&numapply=" . e.target.value;
        $.get(url, function(){});
    };
JS;


?>