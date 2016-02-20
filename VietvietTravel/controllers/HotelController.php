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
use yii\data\Sort;

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
                        'actions' => ['show', 'show-detail', 'search'],
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
                        'actions' => ['create', 'update', 'delete', 'upload', 'upload', 'recycle-bin', 'delete-multi-hotel'],
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
        $location = new Location();
        $small = new FileUpload();
        $large = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'location' => $location,
                'small' => $small,
                'large' => $large,
            ]);
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
        $location = new Location();
        $small = new FileUpload();
        $large = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'location' => $location,
                'small' => $small,
                'large' => $large,
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
        $target = $this->findModel($id);
        if($target->status == 1){
            Yii::$app->db->createCommand()->update('hotel', ['status' => 0], ['id' => $target->id])->execute();
        }else{
            $target->delete();
        }
        //$this->findModel($id)->delete();

        return $this->redirect(['index', 'HotelSearch[status]' => 1]);
    }

    /* show info from hotel*/
    public function actionShow(){
        $this->layout = "main";
        $param = Yii::$app->getRequest()->getQueryParam('1');
        $arr = explode("-", $param);
        $model = Location::find()->where(['name' => join(" ", $arr)])->one();
        $provider = new ActiveDataProvider([
            'query' => $model->getHotels(),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        $sortHotel = new Sort([
            'attributes' => [
                'star' => [
                    'asc' => ['star' => SORT_ASC],
                    'desc' => ['star' => SORT_DESC],
                    'default' => 'star',
                    'label' => 'Star',
                ],
            ],
        ]);

        return $this->render('show', [
            'model' => $model,
            'provider' => $provider,
            'sort' => $sortHotel,
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
     * search hotel
     */
    public function actionSearch($hotelName = "", $hotelArea = "", $hotelNumber = ""){
        //$sql = "SELECT * FROM tour WHERE code LIKE ISNULL(" . $tourName . ")  AND id_tourtype LIKE ISNULL(" . $tourDetination . ")  AND length LIKE ISNULL(" . $tourLen . ")";
        $this->layout = "main";
        $model = Hotel::find();

        if($hotelName){
            $model = $model->where(['name' => $hotelName]);
        }
        if($hotelArea){
            $model = $model->andWhere(['id_location' => $hotelArea]);
        }
        if($hotelNumber){
            $model = $model->andWhere(['star' => $hotelNumber]);
        }

        //$model = $model->all();

        $provider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        $sortTour = new Sort([
            'attributes' => [
                'length' => [
                    'asc' => ['length' => SORT_ASC],
                    'desc' => ['length' => SORT_DESC],
                    'default' => 'length',
                    'label' => 'Length',
                ],
            ],
        ]);

        return $this->render('show', [
            //'tour' => $tour,
            'provider' => $provider,
            'sort' => $sortTour,
        ]);
    }

    /**
     * Move rows to recycle bin
     * change status 1 => 0;
     */
    public function actionRecycleBin(){
        $tour_id = [];
        $keys = $_POST['keys'];
        foreach($keys as $key => $value){
            array_push($tour_id, $value);
        }

        $connection = Yii::$app->db;
        $connection->createCommand()->update('hotel', ['status' => 0], ['id' => $tour_id])->execute();

        echo '1';
    }

    /**
     * delete multiple tour
     * using ajax.
     *
     */
    public function actionDeleteMultiHotel(){
        $tour_id = [];
        $keys = $_POST['keys'];
        if(!empty($keys)){
            foreach($keys as $key => $value){
                array_push($tour_id, $value);
            }
        }
        $connection = Yii::$app->db;
        $connection->createCommand()->delete('hotel', ['id' => $tour_id])->execute();

        echo '1';
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
