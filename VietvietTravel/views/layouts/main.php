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
$article = Article::find()->where(['hot' => '1'])->all();
/* select article services */
$articleService = Article::find()->where(['type' => "100"])->all();
$services = [];
for($i = 0; $i < count($articleService); $i++) {
    $services[] = ['label' => $articleService[$i]->title, 'url' => ['article/' . implode('-', explode(' ', $articleService[$i]->title))]];
}
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
    <?php $this->beginBody(); ?>

    <div class="wrap">
        <div class="container site site-border-top">
            <div class="top">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="logo">
                            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>">
                                <?= Html::img('@web/images/'. $info->logo, ['alt'=>Yii::$app->name, 'class' => 'logo-size']) ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="right-pannel">
                            <ul class="nav-top list-inline">
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Hotline: <?php echo $info->tel; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:<?= $info->email ?>">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email: <?php echo $info->email; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['contact/create']) ?>">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            NavBar::begin();
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'dropDownCaret' => '',
                'activateParents' => true,
                'items' => [
                    ['label' => 'HOME', 'url' => ['/site/index']],
                    ['label' => 'ABOUT US', 'url' => ['/article/aboutus']],
                    [
                        'label' => 'BICYCLE TOUR',
                        'items' => [
                            ['label' => 'Bicycle tour 1 day', 'url' => ['tour/Bicycle-tour-1-day']],
                            ['label' => 'Bicycle tour 2 day', 'url' => ['tour/Bicycle-tour-2-day']],
                            ['label' => 'Bicycle tour 3 day', 'url' => ['tour/Bicycle-tour-3-day']],
                            ['label' => 'Bicycle tour 4 day', 'url' => ['tour/Bicycle-tour-4-day']],
                        ],
                    ],
                    [
                        'label' => 'TRAVEL STYLE',
                        'items' => [
                            ['label' => 'Day tour', 'url' => ['tour/Day-Tour']],
                            ['label' => 'Mekong Delta tour', 'url' => ['tour/Mekong-Delta-Tour']],
                            ['label' => 'Tour packages', 'url' => ['tour/Tour-Packages']],
                            ['label' => 'Open packages tour', 'url' => ['tour/Open-Packages-Tour']],
                            ['label' => 'Northern Cruise', 'url' => ['tour/Nothern-Cruise']],
                            ['label' => 'Adventure Tour', 'url' => ['tour/Adventure-Tour']],
                            ['label' => 'National park tour', 'url' => ['tour/National-Park-Tour']],
                        ],
                    ],
                    [
                        'label' => 'HOTEL DIRECTORY',
                        'items' => [
                            ['label' => 'Hotels in HCM city', 'url' => ['hotel/hcm']],
                            ['label' => 'Hotels in Dalat', 'url' => ['hotel/da-lat']],
                            ['label' => 'Hotels in Nhatrang', 'url' => ['hotel/nha-trang']],
                            ['label' => 'Hotels in Hoi An', 'url' => ['hotel/hoi-an']],
                            ['label' => 'Hotels in Hue', 'url' => ['hotel/hue']],
                            ['label' => 'Hotels in Danang', 'url' => ['hotel/da-nang']],
                            ['label' => 'Hotels in HaNoi', 'url' => ['hotel/ha-noi']],
                            ['label' => 'Hotels in SaPa', 'url' => ['hotel/sa-pa']],
                        ],
                    ],
                    ['label' => 'VIETNAM VISA ON ARRIVAL', 'url' => ['visa/create']],
                    ['label' => 'TOUR DIARY', 'url' => ['/article/tour']],
                    [
                        'label' => 'TRAVEL SERVICES',
                        'items' => $services
                    ],
                ],
            ]);
            NavBar::end();
            ?>
            <div id="wrapper">
            <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                    <?php foreach($slides as $slide){ ?>
                        <?= Html::img('@web/'. $slide['link']) ?>
                    <?php } ?>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                </div>
            </div>
        </div>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="row">
                <div class="col-md-3 left-side">
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
                                <select id="tour-len" name="tourLen" id="" class="form-control">
                                    <option value="">Length of tour...</option>
                                    <option value="1">1 Day</option>
                                    <option value="2-5">2 - 5 Days</option>
                                    <option value="6-9">6 - 9 Days</option>
                                    <option value="10-15">10 - 15 Days</option>
                                    <option value="16">16++ Days</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block text-bold">SEARCH</button>
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
                            <button class="btn btn-primary btn-block text-bold">SEARCH</button>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <div class="video-box sidebar">
                        <iframe src="<?= $info->video ?>" width="100%" height="200"></iframe>
                        <?php $aboutUs = Article::find()->where(['type' => 102])->one() ?>
                        <h4><?= $aboutUs->title?></h4>
                        <p><?= $aboutUs->briefinfo ?></p>
                        <div class="right">
                            <a href="#"><em>Read more</em></a>
                        </div>
                    </div>
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>
                    <div class="services">
                        <div class="row">
                            <h4 class="title">Our Services</h4>
                            <ul class="list-services">
                                <?php foreach($articleService as $row){ ?>
                                    <li class="item">
                                        <a href="<?php echo \yii\helpers\Url::to(['article/'. implode('-', explode(" ",$row->title))]) ?>">
                                            <?= \yii\helpers\Html::img('@web/images/'. $row->smallimg, ['alt' => 'service']) ?>
                                        </a>
                                    </li>
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
                                        <div class="row">
                                            <div class="col-md-1">
                                                <span class="glyphicon glyphicon-grain"></span>
                                            </div>
                                            <div class="col-md-10">
                                                <a href="<?php echo yii\helpers\Url::to(['article/'. implode('-', explode(" ",$row->title))]) ?>"><?php echo $row->title ?></a>
                                            </div>
                                        </div>
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

    <footer class="footer"  style="position: relative">
        <div class="container site">
            <ul id="menu-bottom">
                <li><a href="<?php echo \yii\helpers\Url::to(['site/index']) ?>">Home</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['hotel/show']) ?>">Hotel Reservation</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 19]) ?>">Flight Booking</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 13]) ?>">Train Booking</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['visa/create']) ?>">Visa Requirements</a></li><!--
            --><li><a href="<?php echo \yii\helpers\Url::to(['article/detail', 'id' => 14]) ?>">Car Rental</a></li>
            </ul>

            <div class="row" style="position: relative">
                <div class="col-md-12 text-center">
                    <p>Head Office: <?php echo $info->address ?></p>
                    <p>Phone: <?php echo $info->mobile ?></p>
                    <p>Fax: <?php echo $info->fax ?></p>
                    <p>In Hanoi: <?php echo $info->address ?></p>
                    <p>E-mail: <?php echo $info->email ?></p>
                </div>
                <div class="follow">
                    <p><strong>Follow us:</strong></p>
                    <span><a href="<?php echo $info->facebook ?>"><?= \yii\helpers\Html::img('@web/images/facebook.png') ?></a></span>
                    <span><a href="<?php echo $info->skype ?>"><?= \yii\helpers\Html::img('@web/images/skype.png') ?></a></span>
                    <span><a href="<?php echo $info->zalo ?>"><?= \yii\helpers\Html::img('@web/images/zalo.png') ?></a></span>
                    <span><a href="<?php echo $info->yahoo ?>"><?= \yii\helpers\Html::img('@web/images/yahoo.png') ?></a></span>
                    <span><a href="<?php echo $info->viber ?>"><?= \yii\helpers\Html::img('@web/images/viber.png') ?></a></span>
                </div>
            </div>
        </div>
        <div class="support-icon-right">
            <h3>Chat Live Facebook</h3>
            <div class="online-support">
                <div
                    class="fb-page"
                    data-href="https://www.facebook.com/facebook"
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
    <a href="#top" class="go-top hide">
        <span class="glyphicon glyphicon-circle-arrow-up"></span>
    </a>

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