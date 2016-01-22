<?php

namespace app\controllers;

use app\models\Visadetail;
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
                        'actions' => ['index', 'view'],
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
    public function actionCreate($num = 1, $visa = [])
    {
        $this->layout = "main";
        $model = new Visa();
        //$model->load(\Yii::$app->request->post());
        /*echo "<pre>";
        print_r($model);
        echo "</pre>";
        print_r($_POST);
        print_r($_GET);
        exit;*/
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
            $visa = explode(",", $visa);
            $model->fullname = $visa[0];
            $model->email = $visa[1];
            $model->mobile = $visa[2];
            $model->nation = $visa[3];
            $model->processtime = $visa[4];
            $model->visatype = $visa[5];
            $model->usebefore = $visa[6];
            $model->receiveinfo = $visa[7];
            $model->paymethod = $visa[8];
            $model->knwthrough = $visa[9];
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
