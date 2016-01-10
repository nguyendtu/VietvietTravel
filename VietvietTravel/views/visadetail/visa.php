<?= $form->field($model, 'id_visa')->textInput() ?>

<?= $form->field($model, 'fullame')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'idpassport')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'birthday')->textInput() ?>

<?= $form->field($model, 'expire')->textInput() ?>

<?= $form->field($model, 'flightdetail')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'arrivaldate')->textInput() ?>

<?= $form->field($model, 'exitdate')->textInput() ?>

<?= $form->field($model, 'portarrival')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'purposevisit')->textInput(['maxlength' => true]) ?>