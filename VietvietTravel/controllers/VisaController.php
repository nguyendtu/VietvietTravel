<?php

namespace app\controllers;

use app\models\Booktour;
use app\models\Visadetail;
use arturoliveira\ExcelView;
use Yii;
use app\models\Visa;
use app\models\VisaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;
use app\models\Article;

/**
 * VisaController implements the CRUD actions for Visa model.
 */
class VisaController extends Controller
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
                        'actions' => ['info', 'create'],
                        'allow' => true,
                        'roles' => [
                            '?',
                            User::ROLE_ADMIN,
                            User::ROLE_USER,
                        ],
                    ],
                    [
                        'actions' => ['index', 'view', 'update-status', 'export'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                            User::ROLE_USER,
                        ],
                    ],
                    [
                        'actions' => ['update', 'delete', 'upload', 'upload'],
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
     * Lists all Visa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visa model.
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
     * Creates a new Visa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($num = 1)
    {
        $this->layout = "main";
        $model = new Visa();
        $article = Article::find()->where(['type' => 103])->one();

        $visaDetails = [];

        $numApply = isset($_POST['Visa']['numapply']) ? $_POST['Visa']['numapply'] : $num;

        for($i = 0; $i < $numApply; $i++){
            $visaDetails[] = new Visadetail();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $visaId = $model->id;
            if (isset($_POST['Visadetail'])) {
                foreach ($_POST['Visadetail'] as $index => $arr) {
                    foreach ($arr as $i => $val) {
                        $visaDetails[$index - 1][$i] = $val;
                    }
                    $visaDetails[$index - 1]['id_visa'] = $visaId;
                }
                foreach ($visaDetails as $visaDetail) {
                    if ($visaDetail->save()) {

                    }
                }
                Yii::$app->mailer->compose('@app/views/mail/mail-layout', [
                        'model' => $model,
                        'visaDetails' => $visaDetails,
                    ])
                    ->setFrom($model->email)
                    ->setTo('duytu2005@gmail.com')
                    ->setSubject('Book tour')
                    ->send();
                return $this->render('success',[
                    'model' => $model,
                    'visaDetails' => $visaDetails,
                    'article' => $article,
                ]);
            }
        } else if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
                'article' => $article,
                'visaDetails' => $visaDetails,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'visaDetails' => $visaDetails,
                'article' => $article,
                //'num' => $num,
            ]);
        }
    }

    /**
     * Updates an existing Visa model.
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
     * Updates status an existing Booktour model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateStatus($id)
    {
        $model = $this->findModel($id);
        if($model->status){
            $model->status = 0;
        }else{
            $model->status = 1;
        }
        $model->save();

        $searchModel = new VisaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Visa model.
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
     * show info visa article
     * */
    public function actionInfo(){
        $model = new Visa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('info', [
                'model' => $model,
            ]);
        }
    }

    public function actionExport($id) {
        $model = Visa::find()->where(['id' => $id])->one();
        $visaRelation = Visadetail::find()->where(['id_visa' => $model->id]);
        $provider = new \yii\data\ActiveDataProvider([
            'query' => $visaRelation,
        ]);
        /*$searchModel = new VisaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/
        ExcelView::widget([
            'dataProvider' => $provider,
            //'filterModel' => $searchModel,
            'fullExportType'=> 'xlsx', //can change to html,xls,csv and so on
            'filename' => 'Visa',
            'fullExportConfig' => [
                'xlsx' => [
                    'filename' => 'Visa',
                ],
            ],
            'grid_mode' => 'export',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'id_visa',
                'fullname',
                'nation',
                'idpassport',
                'birthday',
                'expire',
                'flightdetail',
                'arrivaldate',
                'exitdate',
                'portarrival',
                'purposevisit',
            ],

        ]);
    }

    /**
     * Finds the Visa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
