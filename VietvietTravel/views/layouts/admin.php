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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/themes/default/style.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/jstree.min.js"></script>
    <?php $this->head() ?>
    <script>
        jQuery(function($) {
            $("#tree_view").jstree({
                //"plugins" : ["checkbox"]
            });

            $('.action').parent().css({"position": "relative", "width": "100%"});

            $('#tree_view').on("changed.jstree", function (e, data) {
                $('.jstree-node > a').css({
                    "position": "relative",
                    "width": "100%",
                    "border": "none",
                    "box-shadow": "none"
                });
                $('.jstree-node > a > div').addClass(" sr-only");
                $('#' + data.selected[0] + '> a').css({
                    "position": "relative",
                    "width": "100%",
                    "border": "1px solid #7ed6d6",
                    "box-shadow": "0 0 15px #7ed6d6"
                });
                $('#' + data.selected[0] + '> a > div').removeClass(" sr-only");
            });
        });
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container-fluid site-admin">
        <div class="row">
            <div class="col-md-2">
                <div id="admin-controls">
                <?php
                    NavBar::begin([
                        'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar navbar-default nav-admin',
                        ]
                    ]);
                    echo Nav::widget([
                        'options' => ['class' => 'nav navbar-nav nav-tabs list'],
                        'dropDownCaret' => '',
                        'items' => [
                            ['label' => 'Info Company', 'url' => ['/infocompany/view', 'id' => 1]],
                            ['label' => 'TOUR', 'url' => ['/tour/index']],
                            ['label' => 'TOUR TYPE', 'url' => ['/tourtype/index']],
                            ['label' => 'HOTEL', 'url' => ['/hotel/index']],
                            ['label' => 'Location', 'url' => ['/location/index']],
                            ['label' => 'Book tour', 'url' => ['/booktour/index']],
                            ['label' => 'Vietnam visa on Arrival', 'url' => ['/visa/info']],
                            ['label' => 'Visa', 'url' => ['/visa/index']],
                            ['label' => 'Article', 'url' => ['/article/index']],
                            ['label' => 'Contact', 'url' => ['/contact/index']],
                            Yii::$app->user->identity->permit == 'A' ?
                                ['label' => 'Account', 'url' => ['/users/index']] : "",
                            Yii::$app->user->isGuest ?
                                ['label' => 'Login', 'url' => ['/admin/login']] :
                                ['label' => 'Logout ('. Yii::$app->user->identity->fullname .')',
                                    'url' => ['/admin/logout'],
                                    'linkOptions' => ['data-method' => 'post']],
                        ],
                    ]);
                ?>
                <!--<div class="navbar-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-success" href="<?/*= \yii\helpers\Url::to(['site/index']) */?>">
                                <span class="glyphicon glyphicon-home"></span>
                                View Site
                            </a>
                        </div>
                        <div class="col-md-6">
                            <?php /*if(Yii::$app->user->isGuest){ */?>
                                <a class="btn btn-primary" href="<?/*= \yii\helpers\Url::to(['admin/login']) */?>">
                                    <span class="glyphicon glyphicon-log-in"></span>
                                    Login
                                </a>
                            <?php /*}else{ */?>
                                <a class="btn btn-danger" href="<?/*= \yii\helpers\Url::to(['admin/logout']) */?>">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Logout
                                </a>
                            <?php /*} */?>
                        </div>
                    </div>
                </div>-->
                <?php
                    NavBar::end();
                ?>
                </div>
            </div>
            <div class="col-md-10">
                <h2 class="manage-title">Manage <?= $this->title ?></h2>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>
    </div>
    <?php
    ?>

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
