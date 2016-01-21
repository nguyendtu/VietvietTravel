<?php

namespace app\controllers;

use app\models\Booktour;
use Yii;
use app\models\Tour;
use app\models\TourSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;
use yii\data\ActiveDataProvider;
use app\models\Tourtype;
use app\models\FileUpload;
use yii\data\Sort;
/**
 * TourController implements the CRUD actions for Tour model.
 */
class TourController extends Controller
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
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
                        'actions' => ['show', 'show-detail', 'sort', 'search'],
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
     * Lists all Tour models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TourSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tour model.
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
     * Creates a new Tour model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tour();
        $tourtype = new Tourtype();
        $small = new FileUpload();
        $large = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tourtype' => $tourtype,
                'small' => $small,
                'large' => $large,
            ]);
        }
    }

    /**
     * Updates an existing Tour model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tourtype = new Tourtype();
        $small = new FileUpload();
        $large = new FileUpload();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tourtype' => $tourtype,
                'small' => $small,
                'large' => $large,
            ]);
        }
    }

    /**
     * Deletes an existing Tour model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /*
     * show tour
     */
    public function actionShow(){
        $this->layout = "main";
        $param = Yii::$app->getRequest()->getQueryParam('1');
        $model = Tourtype::find()->where(['name' => $param])->one();

        $provider = new ActiveDataProvider([
            'query' => $model->getTours(),
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
            'model' => $model,
            'provider' => $provider,
            'sort' => $sortTour,
        ]);
    }

    /* show detail about tour*/
    public function actionShowDetail($id){
        $this->layout = "main";
        $model = $this->findModel($id);
        $tourtype = Tourtype::findOne($model->id_tourtype);
        $related = $tourtype->tours;

        return $this->render('show-detail', [
            'model' => $model,
            'related' => $related,
        ]);
    }

    /**
     * search tour
     */
    public function actionSearch($tourName = "", $tourStyle = "", $tourDetination = "", $tourLen = ""){
        //$sql = "SELECT * FROM tour WHERE code LIKE ISNULL(" . $tourName . ")  AND id_tourtype LIKE ISNULL(" . $tourDetination . ")  AND length LIKE ISNULL(" . $tourLen . ")";
        $this->layout = "main";
        $model = Tour::find();

        if($tourName){
            $model = $model->where(['or', 'code='. $tourName.'', 'name='. $tourName.'']);
        }
        if($tourDetination){
            $model = $model->andWhere(['id_tourtype' => $tourDetination]);
        }
        if($tourLen){
            $model = $model->andWhere(['length' => $tourLen]);
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
     * Finds the Tour model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tour::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
