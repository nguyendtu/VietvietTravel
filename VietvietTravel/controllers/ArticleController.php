<?php

namespace app\controllers;

use app\models\FileUpload;
use app\models\Tourtype;
use app\models\Visa;
use app\models\Visadetail;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
                //'only' => [],
                'rules' => [
                    [
                        'actions' => ['tour', 'detail', 'aboutus', 'set-model'],
                        'allow' => true,
                        'roles' => [
                            '?',
                            User::ROLE_ADMIN,
                            User::ROLE_USER
                        ],
                    ],
                    [
                        'actions' => ['create', 'update', 'view', 'index', 'delete-multi-article'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_USER
                        ],
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $tourtype = new Tourtype();
        $small = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'tourtype' => $tourtype,
                'small' => $small,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tourtype = new Tourtype();
        $small = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tourtype' => $tourtype,
                'small' => $small,
            ]);
        }
    }

    /**
     * show tour diary article
     */
    public function actionTour(){
        $this->layout = "main";
        $model = Article::find()->where(['not in', 'type', [100, 101, 102, 103]]);

        $provider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render("tour", [
            'model' => $model,
            'provider' => $provider,
        ]);
    }

    /**
     * show article
     */
    public function actionDetail($id = 0, $title = ""){
        $this->layout = "main";

        if($id != 0) {
            $model = Article::find()->where(['id' => $id])->one();
        }else{
            $title = implode(" ", explode("-", $title));
            $model = Article::find()->where(['title' => $title])->one();
        }


        return $this->render("detail", [
            'model' => $model,
        ]);
    }

    /**
     * show article about us
     */
    public function actionAboutus(){
        $this->layout = "main";

        $model = Article::find()->where(['type' => 102])->one();

        return $this->render("about-us", [
            'model' => $model,
        ]);
    }

    public function actionSetModel($num){
        $visa = new Visa();
        $models = [];
        for($i = 0; $i < $num; $i++){
            array_push($models, new Visadetail());
        }

        return $this->renderAjax('../visa/_form', [
            'visaDetails' => $models,
            'model' => $visa,
        ]);
    }

    /**
     * show article visa
     */
    /*public function actionVisa(){
        $this->layout = "main";

        $visa = new Visa();
        $visaDetails = [];

        $num = 1;
        if(Yii::$app->request->post('numapply')){
            $num = Yii::$app->request->post('numapply');
            echo $num; return;
        }

        for ($i = 0; $i < $num; $i++) {
            $visaDetail = new Visadetail();
            array_push($visaDetails, $visaDetail);
        }

        $model = Article::find()->where(['type' => 103])->one();

        return $this->render("visa", [
            'model' => $model,
            'visa' => $visa,
            'visaDetails' => $visaDetails,
        ]);
    }*/

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * delete multiple article
     * using ajax.
     *
     */
    public function actionDeleteMultiArticle(){
        $id = [];
        $keys = $_POST['keys'];
        if(!empty($keys)){
            foreach($keys as $key => $value){
                array_push($id, $value);
            }
        }
        $connection = Yii::$app->db;
        $connection->createCommand()->delete('article', ['id' => $id])->execute();

        echo '1';
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
