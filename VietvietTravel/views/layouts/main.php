<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Infocompany;
use app\models\Slide;
use app\models\Article;
use yii\widgets\ActiveForm;

AppAsset::register($this);

/* select info company */
$info = Infocompany::find()->one();
/* select slide */
$slides = Slide::find()->where(['position' => '1'])->all();
/* select article*/
$article = Article::find()->where(['type' => '101'])->all();
/* select article services */
$articleService = Article::find()->where(['type' => "100"])->all();
$this->title = $info->name;
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
    <!--Start of Zopim Live Chat Script-->
    <!--<script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="//v2.zopim.com/?3cbqwXxHmokwre1bDdhoxRPmqagz5ZFu";z.t=+new Date;$.
                type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>-->
    <!--End of Zopim Live Chat Script-->
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1492399707732296";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="top">
        <ul class="nav-top">
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Hotline: <?php echo $info->tel; ?>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email: <?php echo $info->email; ?>
                </a>
            </li>
            <li>
                <a href="?r=contact/create">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact us
                </a>
            </li>
        </ul>
    </div>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/'. $info->logo, ['alt'=>Yii::$app->name]),
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
            ['label' => 'HOME', 'url' => ['/site/index']],
            ['label' => 'ABOUT US', 'url' => ['/article/about-us']],
            [
            'label' => 'BICYCLE TOUR',
            'items' => [
                 ['label' => 'Bicycle tour 1 day', 'url' => ['tour/show', 'Bicycle tour 1 day']],
                 ['label' => 'Bicycle tour 2 day', 'url' => ['tour/show', 'Bicycle tour 2 day']],
                 ['label' => 'Bicycle tour 3 day', 'url' => ['tour/show', 'Bicycle tour 3 day']],
                 ['label' => 'Bicycle tour 4 day', 'url' => ['tour/show', 'Bicycle tour 4 day']],
            ],
            ],
            [
            'label' => 'TRAVEL STYLE',
            'items' => [
                 ['label' => 'Day tour', 'url' => ['tour/show', 'Day Tour']],
                 ['label' => 'Mekong Delta tour', 'url' => ['tour/show', 'Mekong Delta Tour']],
                 ['label' => 'Tour packages', 'url' => ['tour/show', 'Tour Packages']],
                 ['label' => 'Open packages tour', 'url' => ['tour/show', 'Open Packages Tour']],
                 ['label' => 'Northern Cruise', 'url' => ['tour/show', 'Northern Cruise']],
                 ['label' => 'Adventure Tour', 'url' => ['tour/show', 'Adventure Tour']],
                 ['label' => 'National park tour', 'url' => ['tour/show', 'National Park Tour']],
            ],
            ],
            [
            'label' => 'HOTEL DIRECTORY',
            'items' => [
                 ['label' => 'Hotels in HCM city', 'url' => ['hotel/show', 'hcm']],
                 ['label' => 'Hotels in Dalat', 'url' => ['hotel/show', 'da-lat']],
                 ['label' => 'Hotels in Nhatrang', 'url' => ['hotel/show', 'nha-trang']],
                 ['label' => 'Hotels in Hoi An', 'url' => ['hotel/show', 'hoi-an']],
                 ['label' => 'Hotels in Hue', 'url' => ['hotel/show', 'hue']],
                 ['label' => 'Hotels in Danang', 'url' => ['hotel/show', 'da-nang']],
                 ['label' => 'Hotels in HaNoi', 'url' => ['hotel/show', 'ha-noi']],
                 ['label' => 'Hotels in SaPa', 'url' => ['hotel/show', 'sa-pa']],
            ],
            ],
            ['label' => 'Vietnam Visa on Arrival', 'url' => ['visa/create']],
            ['label' => 'TOUR DIARY', 'url' => ['/article/tour']],
            [
            'label' => 'TRAVEL SERVICES',
            'items' => [
                 ['label' => 'Booking Flight ticket', 'url' => ['article/detail', 'title' => 'Booking Flight ticket']],
                 ['label' => 'Booking train ticket', 'url' => ['article/detail', 'title' => 'Booking train ticket']],
                 ['label' => 'Car for rent', 'url' => ['article/detail', 'title' => 'Car for rent']],
                 ['label' => 'Moto bike for rent', 'url' => ['article/detail', 'title' => 'Moto bike for rent']],
                 ['label' => 'Bicycle for rent', 'url' => ['article/detail', 'title' => 'Bicycle for rent']],
            ],
            ],
        ],

    ]);
    NavBar::end();
    ?>
    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php foreach($slides as $slide){ ?>
                    <img src="<?php echo $slide['link'] ?>" data-thumb="<?php echo $slide['link'] ?>" alt="" />
                <?php } ?>
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div>
        </div>
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row">
            <div class="col-md-3">
                <div class="search">
                    <ul class="nav nav-tabs" id="nav_search">
                        <li role="presentation" class="active" data-target="tour"><a>TOUR</a></li>
                        <li role="presentation" data-target="hotel"><a>HOTEL</a></li>
                    </ul>
                    <div id="tour" class="search-style">
                        <?php ActiveForm::begin([
                            'action' => ['tour/search'],
                            'method' => 'get',
                        ]); ?>
                            <div class="form-group">
                                <label for="tour-name" class="sr-only">Tour name</label>
                                <input type="text" id="tour-name" name="tourName" class="form-control" placeholder="Enter tour name or trip code....">
                            </div>
                            <div class="form-group">
                                <label for="tour-style" class="sr-only">Tour style</label>
                                <select name="tourStyle" id="tour-style" class="form-control">
                                    <option value="">Select tour style</option>
                                    <option value="bicycle">Bicycle tour</option>
                                    <option value="travel">Travel style</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tour-detination" class="sr-only">Tour style destination</label>
                                <select name="tourDetination" id="tour-detination" class="form-control">
                                    <option value="">Select tour destination</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tour-len" class="sr-only">Tour length</label>
                                <input type="text" id="tour-len" name="tourLen" class="form-control" placeholder="Length of tour...">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div id="hotel" class="search-style">
                        <?php ActiveForm::begin([
                            'action' => ['hotel/search'],
                            'method' => 'get',
                        ]); ?>
                            <div class="form-group">
                                <label for="hotel-name" class="sr-only">Hotel name</label>
                                <input type="text" name="hotelName" id="hotel-name" class="form-control" placeholder="Enter hotel name...">
                            </div>
                            <div class="form-group">
                                <label for="hotel-area" class="sr-only">Hotel area</label>
                                <select name="hotelArea" id="hotel-area" class="form-control">
                                    <?php
                                        $htArea = app\models\Location::find()->all();
                                        foreach($htArea as $row){
                                    ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hotel-number" class="sr-only">Hotel number</label>
                                <select name="hotelNumber" id="hotel-number" class="form-control">
                                    <option value="">Enter hotel number....</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block">Search</button>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="video-box sidebar">
                    <video controls>
                        <source src="images/<?php echo $info->video ?>" type="video/mp4">
                        <source src="images/<?php echo $info->video ?>" type="video/ogg">
                    </video>
                    <h4>Welcome to Our Site!</h4>
                    <p>Established in 2001, TNK Travel have been wholly dedicated to providing the ultimate experience for those wishing to discover all that Vietnam, Laos, Cambodia, Thailand and Myanamar have to offer...</p>
                    <div class="right">
                        <a href="#"><em>Read more</em></a>
                    </div>
                </div>
                <div class="services">
                    <div class="row">
                        <h4 class="title">Our Services</h4>
                        <ul class="list-services">
                            <?php foreach($articleService as $row){ ?>
                            <li class="item"><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => $row->id])?>"><img src="images/<?php echo $row->smallimg ?>" alt="service"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="travels">
                    <div class="row">
                        <h4 class="title">TRAVEL ARTICLE</h4>
                        <ul class="travel sidebar">
                            <?php foreach($article as $row){ ?>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="<?php echo yii\helpers\Url::to(['article/detail', 'id' => $row->id]) ?>"><?php echo $row->title ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?= $content ?>        
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <ul id="menu-bottom">
            <li><a href="<?php echo \yii\helpers\Url::to(['site/index']) ?>">Home</a></li><!--
            --><li><a href="#">Customized Tour</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['hotel/show']) ?>">Hotel Reservation</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 19]) ?>">Flight Booking</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 13]) ?>">Train Booking</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['visa/create']) ?>">Visa Requirements</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 14]) ?>">Car Rental</a></li>
        </ul>
        <ul class="countries-tour">
            <?php  ?>
            <li class="country">
                <h4 class="country-caption">VIETNAM TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">Vietnam Tour Packages</a></li>
                    <li><a href="#">Vietnam Muslim Tours</a></li>
                    <li><a href="#">Vietnam Adventure Tours</a></li>
                    <li><a href="#">Vietnam Halong Cruises</a></li>
                    <li><a href="#">Mekong River Cruises</a></li>
                    <li><a href="#">Mekong Delta Tours</a></li>
                    <li><a href="#">Vietnam Trek, Kayak, Cycle</a></li>
                    <li><a href="#">Vietnam Beach Breaks</a></li>
                    <li><a href="#">Vietnam Day Trips</a></li>
                </ul>
            </li><!--
            -->
            <?php ?>
            <li class="country">
                <h4 class="country-caption">VIETNAM TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">Vietnam Tour Packages</a></li>
                    <li><a href="#">Vietnam Muslim Tours</a></li>
                    <li><a href="#">Vietnam Adventure Tours</a></li>
                    <li><a href="#">Vietnam Halong Cruises</a></li>
                    <li><a href="#">Mekong River Cruises</a></li>
                    <li><a href="#">Mekong Delta Tours</a></li>
                    <li><a href="#">Vietnam Trek, Kayak, Cycle</a></li>
                    <li><a href="#">Vietnam Beach Breaks</a></li>
                    <li><a href="#">Vietnam Day Trips</a></li>
                </ul>
            </li><!--
            --><li class="country">
                <h4 class="country-caption">LAO TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">Laos Tour Packages</a></li>
                    <li><a href="#">Laos Adventure Tours</a></li>
                    <li><a href="#">Laos Trek, Kayak, Cycle</a></li>
                    <li><a href="#">Laos River Cruises</a></li>
                    <li><a href="#">Laos Day Trips</a></li>
                </ul>
            </li><!--
            --><li class="country">
                <h4 class="country-caption">CAMBODIA TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">Cambodia Tour Packages</a></li>
                    <li><a href="#">Angkor Wat Tours</a></li>
                    <li><a href="#">Phnompenh Tours</a></li>
                    <li><a href="#">Cambodia Muslim Tours</a></li>
                    <li><a href="#">Cambodia Adventure Tours</a></li>
                    <li><a href="#">Cambodia Trek, Kayak, Cycle</a></li>
                    <li><a href="#">Cambodia River Cruises</a></li>
                    <li><a href="#">Cambodia Day Trips</a></li>
                </ul>
            </li><!--
            --><li class="country">
                <h4 class="country-caption">THAILAND TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">Thailand Tour Packages</a></li>
                    <li><a href="#">Thailand Adventure Tours</a></li>
                    <li><a href="#">Thailand Beach Breaks</a></li>
                </ul>
            </li><!--
            --><li class="country">
                <h4 class="country-caption">MYANMAR TOURS</h4>
                <ul class="list-tour">
                    <li><a href="#">myanmar Tour Packages</a></li>
                    <li><a href="#">Myanmar Adventure Tours</a></li>
                    <li><a href="#">Myanmar Trek, Kayak, Cycle</a></li>
                    <li><a href="#">Myanmar River Cruises</a></li>
                    <li><a href="#">Myanmar Beach Breaks</a></li>
                    <li><a href="#">Myannmar Day Trips</a></li>
                </ul>
            </li>
        </ul>
        <div class="follow">
            <p><strong>Follow us:</strong></p>
            <span><a href="<?php echo $info->facebook ?>"><img src="images/facebook.png" alt="facebook icon"></a></span>
            <span><a href="<?php echo $info->skype ?>"><img src="images/skype.png" alt="skype icon"></a></span>
            <span><a href="<?php echo $info->zalo ?>"><img src="images/zalo.png" alt="zalo icon"></a></span>
            <span><a href="<?php echo $info->yahoo ?>"><img src="images/yahoo.png" alt="yahoo icon"></a></span>
            <span><a href="<?php echo $info->viber ?>"><img src="images/viber.png" alt="viber icon"></a></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2015. All Rights Reserved to <img src="assets/images/logo.ong" alt="logo"> Co.,Ltd.</p>
                <strong><p>International Touroperator License No: <?php echo $info->license ?></p></strong>
                <br>
                <p>Head Office: <?php echo $info->address ?></p>
                <p>Phone: <?php echo $info->mobile ?></p>
                <p>Fax: <?php echo $info->fax ?></p>
            </div>
            <div class="col-md-6">
                <img src="assets/images/top.png" alt="top">
                <p>In Hanoi: <?php echo $info->address ?></p>
                <p>E-mail: <?php echo $info->email ?></p>
                <p>Website: <?php echo $info->website ?></p>
            </div>
        </div>
    </div>
    <div class="support-icon-right">
        <h3><i class="fa fa-hand-o-right"></i> Chat Live Facebook</h3>
        <div class="online-support">
            <div
                class="fb-page"
                data-href="https://www.facebook.com/Nguyen-Tu-146333415744425/?skip_nax_wizard=true"
                data-tabs="messages"
                data-height="300"
                data-width="250"
                data-small-header="true"
                data-adapt-container-width="false"
                data-hide-cover="true"
                data-show-facepile="false">
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    $(document).ready(function(){
        var tour = document.getElementById("tour-style");
        tour.onchange = function(e){
            var url = "index.php?r=tourtype/get-tour&tourtype="+ e.target.value;
            $.get(url, function(data){
                data = $.parseJSON(data);
                var detination = document.getElementById("tour-detination");
                detination.innerHTML = "";
                for(var i = 0; i < data.length; i++){
                    var option = document.createElement("option");
                    option.value = data[i].id;
                    option.innerHTML = data[i].name;

                    detination.appendChild(option);
                }
            })
        };
        tinymce.init({
            selector: '#mytextarea',
            height: '300',
        });
        if (Galleria) {
            console.log('abc');
            Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
            if($('.galerria')){
                Galleria.run('.galleria', {
                    autoplay: 3000,
                    transition: 'fade',
                    imageCrop: true
                });
            }
        }
        $('.online-support').hide();
        $('.support-icon-right h3').click(function(e){
            e.stopPropagation();
            $('.online-support').slideToggle();
        });
        $('.online-support').click(function(e){
            e.stopPropagation();
        });
        $(document).click(function(){
            $('.online-support').slideUp();
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>