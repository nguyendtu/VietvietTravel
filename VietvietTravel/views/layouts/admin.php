<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
        'innerContainerOptions' => ['class'=>'container-fluid'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'dropDownCaret' => '',
        'items' => [
            ['label' => 'PROFILE', 'url' => ['/admin/index']],
            ['label' => 'TOUR', 'url' => ['/admin/tour']],
            ['label' => 'HOTEL', 'url' => ['/admin/hotel']],
            ['label' => 'ABOUT US', 'url' => ['/admin/about']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/admin/login']] :
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/admin/logout'],
                    'linkOptions' => ['data-method' => 'post']],
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>        
    </div>
</div>
<?php $this->endBody() ?>
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    height: '300',
  });
  </script>
</body>
</html>
<?php $this->endPage() ?>
