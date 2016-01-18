<?php
use yii\helpers\Html;

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

        <?= $form->field($visaDetail, '[' .$i . ']birthday')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']expire')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']flightdetail')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']arrivaldate')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']exitdate')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']portarrival')->textInput() ?>

        <?= $form->field($visaDetail, '[' .$i . ']purposevisit')->textInput() ?>
    </div>
    <?php $i++; } ?>
<!-- end visa detail info -->