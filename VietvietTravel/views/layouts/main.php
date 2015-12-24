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
    <div class="top">
        <ul class="nav-top">
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Hotline: (84-8) 3920 4766 (16 lines)
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email: info@tnktravel.com
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact us
                </a>
            </li>
        </ul>
    </div>
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
            ['label' => 'HOME', 'url' => ['/site/index']],
            ['label' => 'ABOUT US', 'url' => ['/site/about']],
            [
            'label' => 'BICYCLE TOUR',
            'items' => [
                 ['label' => 'Bicycle tour 1 day', 'url' => '#'],
                 ['label' => 'Bicycle tour 2 day', 'url' => '#'],
                 ['label' => 'Bicycle tour 3 day', 'url' => '#'],
                 ['label' => 'Bicycle tour 4 day', 'url' => '#'],
            ],
            ],
            [
            'label' => 'TRAVEL STYLE',
            'items' => [
                 ['label' => 'Day tour', 'url' => '/tour/'],
                 ['label' => 'Mekong Delta tour', 'url' => '/tour/'],
                 ['label' => 'Tour packages', 'url' => '/tour/'],
                 ['label' => 'Open packages tour', 'url' => '/tour/'],
                 ['label' => 'Northern Cruise', 'url' => '/tour/'],
                 ['label' => 'Adventure Tour', 'url' => '/tour/'],
                 ['label' => 'National park tour', 'url' => '/tour/'],
            ],
            ],
            [
            'label' => 'HOTEL DIRECTORY',
            'items' => [
                 ['label' => 'Hotels in HCM city', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Dalat', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Nhatrang', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Hoi An', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Hue', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Hoi An', 'url' => '/hotel/'],
                 ['label' => 'Hotels in Danang', 'url' => '/hotel/'],
                 ['label' => 'Hotels in HaNoi', 'url' => '/hotel/'],
                 ['label' => 'Hotels in SaPa', 'url' => '/hotel/'],
            ],
            ],
            ['label' => 'Vietnam visa on Arrival', 'url' => ['/site/']],
            ['label' => 'TOUR DIARY', 'url' => ['/tour-diary/index']],
            [
            'label' => 'TRAVEL SERVICES',
            'items' => [
                 ['label' => 'Booking Flight ticket', 'url' => '/service/'],
                 ['label' => 'Booking train ticket', 'url' => '/service/'],
                 ['label' => 'Car for rent', 'url' => '/service/'],
                 ['label' => 'Moto bike for rent', 'url' => '/service/'],
                 ['label' => 'Bicycle for rent', 'url' => '/service/'],
            ],
            ],
            /*Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],*/
        ],

    ]);
    NavBar::end();
    ?>
    <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/slide1.jpg" data-thumb="images/slide1.jpg" alt="" />
                <img src="images/slide2.jpg" data-thumb="images/slide2.jpg" alt="" title="This is an example of a caption" />
                <img src="images/slide3.jpg" data-thumb="images/slide3.jpg" alt="" data-transition="slideInLeft"/>
                <img src="images/slide4.jpg" data-thumb="images/slide4.jpg" alt="" title="#htmlcaption" />
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
                        <form action="#" id="search-tour" method="get" role="form">
                            <div class="form-group">
                                <label for="tour-name" class="sr-only">Tour name</label>
                                <input type="text" id="tour-name" name="tour-name" class="form-control" placeholder="Enter tour name or trip code....">
                            </div>
                            <div class="form-group">
                                <label for="tour-style" class="sr-only">Tour style</label>
                                <select name="tour-style" id="tour-style" class="form-control">
                                    <option value="">Select tour style</option>
                                    <option value="bicycle_tour" checked="checked">Bicycle tour</option>
                                    <option value="travel_style">Travel style</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tour-detination" class="sr-only">Tour style destination</label>
                                <select name="tour-detination" id="tour-detination" class="form-control">
                                    <option value="">Select tour destination</option>
                                    <option value="1">Bicycle tour 1 day</option>
                                    <option value="1">Bicycle tour 2 day</option>
                                    <option value="1">Bicycle tour 3 day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tour-len" class="sr-only">Tour length</label>
                                <input type="text" id="tour-len" name="tour-len" class="form-control" placeholder="Length of tour...">
                            </div>
                            <button class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div>
                    <div id="hotel" class="search-style">
                        <form action="#" method="get" role="form" id="search-hotel">
                            <div class="form-group">
                                <label for="hotel-name" class="sr-only">Hotel name</label>
                                <input type="text" name="hotel-name" id="hotel-name" class="form-control" placeholder="Enter hotel name...">
                            </div>
                            <div class="form-group">
                                <label for="hotel-area" class="sr-only">Hotel area</label>
                                <input type="text" name="hotel-area" id="hotel-area" class="form-control" placeholder="Enter hotel area...">
                            </div>
                            <div class="form-group">
                                <label for="hotel-number" class="sr-only">Hotel number</label>
                                <input type="text" name="hotel-number" id="hotel-number" class="form-control" placeholder="Enter hotel number....">
                            </div>
                            <button class="btn btn-primary btn-block">Search</button>
                        </form>
                    </div>
                </div>
                <div class="video-box sidebar">
                    <video controls>
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.mp4" type="video/ogg">
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
                            <li class="item"><a href="#"><img src="images/flight.jpg" alt="service"></a></li>
                            <li class="item"><a href="#"><img src="images/train.jpg" alt="service"></a></li>
                            <li class="item"><a href="#"><img src="images/car.jpg" alt="service"></a></li>
                            <li class="item"><a href="#"><img src="images/visa.jpg" alt="service"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="travels">
                    <div class="row">
                        <h4 class="title">TRAVEL ARTICLE</h4>
                        <ul class="travel sidebar">
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">The International Travel Exhibition (ITE)</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">Asian Tour You Will Nevver Forget</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">Lifetime Travel Experience in Yangon and Bagan</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">Learning the Inthar Life from River Cruise</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">The Best Cambodia Island Cruises You Need</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">The Heart of Asis</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">VISIT MISTIC CAMBODIA</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">The Joy of Siem Reap Bird Watching Tour with TNK Travel</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">Trekking the Himalayas: the Essential Tips</a>
                            </li>
                            <li>
                                <span class="glyphicon glyphicon-share-alt"></span>
                                <a href="#">An interesting Holiday in Laos</a>
                            </li>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Customized Tour</a></li>
            <li><a href="#">Hotel Reservation</a></li>
            <li><a href="#">Flight Booking</a></li>
            <li><a href="#">Train Booking</a></li>
            <li><a href="#">Visa Requirements</a></li>
            <li><a href="#">Car Rental</a></li>
        </ul>
        <ul class="countries-tour">
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
            <span><a href="#"><img src="images/facebook.png" alt="facebook icon"></a></span>
            <span><a href="#"><img src="images/twitter.png" alt="twitter icon"></a></span>
            <span><a href="#"><img src="images/google.png" alt="google icon"></a></span>
            <span><a href="#"><img src="images/youtube.png" alt="youtube icon"></a></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2015. All Rights Reserved to <img src="assets/images/logo.ong" alt="logo"> Co.,Ltd.</p>
                <strong><p>International Touroperator License No: 79-102/2010/TCLD_GP LHQT</p></strong>
                <br>
                <p>Head Office: 220 De Tham st., Dist 1, Ho Chi Minh city, Vietnam</p>
                <p>Phone: (84-8) 3920 4767 - (84-8) 3920 4767 - (84-8) 3920 5847 (16 lines)</p>
                <p>Fax: (84-8) 3920 5377</p>
            </div>
            <div class="col-md-6">
                <img src="assets/images/top.png" alt="top">
                <p>In Hanoi: 13 Nguyen Huu Huan st., Hoan Kiem dist., Ha Noi capital, Vietnam</p>
                <p>E-mail: info@tnktravel.com</p>
                <p>Website: https://www.tnktravel.com</p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
