<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;
use app\models\Slide;
use app\models\Tour;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        // slide small 1
        $slideCruises = Slide::find()->where(['position' => 2])->all();
        // slide small 2
        $slideLately = Slide::find()->where(['position' => 3])->all();
        // tour hot cruises
        $tourHotCruises = Tour::find()->where(['id_tourtype' => 6, 'hot' => 1])->limit(2)->all();
        // tour hot lately
        $tourHotLately = Tour::find()->where(['hot' => 1])->limit(5)->all();
        return $this->render('index', [
            'slideCruises' => $slideCruises,
            'slideLately' => $slideLately,
            'tourHotCruises' => $tourHotCruises,
            'tourHotLately' => $tourHotLately,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
