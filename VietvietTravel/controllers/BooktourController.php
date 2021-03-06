<?php

namespace app\controllers;

use app\models\Infocompany;
use app\models\Visa;
use Yii;
use app\models\Booktour;
use app\models\BooktourSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

/**
 * BooktourController implements the CRUD actions for Booktour model.
 */
class BooktourController extends Controller
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
                        'actions' => ['booktour'],
                        'allow' => true,
                        'roles' => [
                            '?',
                            User::ROLE_ADMIN,
                            User::ROLE_USER
                        ],
                    ],
                    [
                        'actions' => ['index', 'create', 'update', 'view', 'update-status'],
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
     * Lists all Booktour models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BooktourSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Booktour model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $visaRelation = Visa::find()->where(['fullname' => $model->fullname])
                                    ->andWhere(['email' => $model->email])
                                    ->andWhere(['regdate' => $model->depdate]);
        $provider = new \yii\data\ActiveDataProvider([
            'query' => $visaRelation,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', [
            'model'     => $model,
            'provider'  => $provider,
        ]);
    }

    /**
     * Creates a new Booktour model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Booktour();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Booktour model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionBooktour()
    {
        $this->layout = "main";
        $model = new Booktour();

        $vietTravel = Infocompany::find()->where(['id' => 1])->one();
        if($model->load(Yii::$app->request->post())){

            $model->fullname = $_POST['genderName'] . " " . $model->fullname;
            if ($model->save()) {
                $info = Infocompany::find()->where(['id' => 1])->one();
                Yii::$app->mailer->compose('@app/views/mail/mail-layout', ['model' => $model])
                    ->setFrom($model->email)
                    ->setTo($vietTravel->email)
                    ->setSubject('[vietnam-vietviettravel.com] ' . $model->fullname . " Book tour")
                    ->send();
                return $this->render('@app/views/booktour/success', [
                    'model' => $model,
                ]);
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Booktour model.
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

        $searchModel = new BooktourSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //return $this->goBack();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Booktour model.
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
     * Finds the Booktour model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Booktour the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booktour::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
