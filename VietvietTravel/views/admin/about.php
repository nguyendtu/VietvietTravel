<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-about">
	<h1>TinyMCE Quick Start Guide</h1>
	<?php $form = ActiveForm::begin([
		
		'options' => ['class' => 'relative']
	]) ?>
    	<textarea id="mytextarea" name="mytext">Hello, World!</textarea>
    	<button  name="submit" class="btn btn-primary btn-lg fixed-right">Save</button>
  	<!-- </form> -->
  	<?php ActiveForm::end(); ?>
</div>
