<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-about">
	<h1>TinyMCE Quick Start Guide</h1>
	<form action="" method="post">
    	<textarea id="mytextarea" name="mytext">Hello, World!</textarea>
    	<button  name="submit" class="btn btn-default fixed-right">Save</button>
  	</form>
</div>
