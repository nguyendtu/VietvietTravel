<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\FileUpload;
use app\models\Hotel;
use app\models\HotelSearch;
use app\models\Location;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;


/**
 * HotelController implements the CRUD actions for Hotel model.
 */
class HotelController extends Controller
{
    public $layout = "admin";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['show', 'show-detail'],
                        'allow' => true,
                        'roles' => [
                            '?',
                            User::ROLE_ADMIN,
                            User::ROLE_USER,
                        ],
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_USER,
                        ],
                    ],
                    [
                        'actions' => ['create', 'update', 'delete', 'upload'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Hotel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hotel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hotel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hotel();
        $small = new FileUpload();
        $large = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'small' => $small,
                'large' => $large,
            ]);
        }
    }

    /* upload file */
    public function actionUpload($model){
        echo "abc"; die();
        $model->imgHotel = UploadedFile::getInstanceByName('Hotel[imgHotel]');
        echo "<pre>";
        print_r($model);
        echo "</pre>";
        exit;
        if($model->imgHotel){
            $model->imgHotel->saveAs('C:/xampp/htdocs/VietvietTravel/VietvietTravel/web/images/' . $model->imgHotel->baseName . '.' . $model->imgHotel->extension);
        }

        $model->imgSlideHotel = UploadedFile::getInstanceByName('Hotel[imgSlideHotel]');
        if($model->imgSlideHotel){
            echo "<pre>";
            foreach($model->imgSlideHotel as $img){
                print_r($img);
            }
            echo "</pre>";
            exit;
        }
    }

    /**
     * Updates an existing Hotel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hotel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /* show info from hotel*/
    public function actionShow(){
        $this->layout = "main";
        $param = Yii::$app->getRequest()->getQueryParam('1');
        $model = Location::find()->where(['name' => $param])->one();
        $provider = new ActiveDataProvider([
            'query' => $model->getHotels(),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        return $this->render('show', [
            'model' => $model,
            'provider' => $provider,
        ]);
    }

    /* show detail about hotel*/
    public function actionShowDetail($id){
        $this->layout = "main";
        $model = $this->findModel($id);
        $location = Location::findOne($model->id_location);
        $related = $location->hotels;
        return $this->render('show-detail', [
            'model' => $model,
            'related' => $related,
        ]);
    }

    /**
     * Finds the Hotel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hotel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hotel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}