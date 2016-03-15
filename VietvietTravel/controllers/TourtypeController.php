<?php

namespace app\controllers;

use app\models\FileUpload;
use Yii;
use app\models\Tourtype;
use app\models\TourtypeSearch;
use yii\db\Query;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TourtypeController implements the CRUD actions for Tourtype model.
 */
class TourtypeController extends Controller
{
    public $layout = 'admin';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tourtype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Tourtype::find()->where(['not in', 'parent', (new Query())->select('name')->from('tourtype')])->groupBy('parent')->all();


        //$model = Yii::$app->db->createCommand('select parent from tourtype where tourtype.parent <> tourtype.name')->queryAll();

        $tree = "<ul>";
        foreach ($model as $tourType) {
            foreach ($tourType as $key => $value) {
                if($value != 'article') {
                    if ($key == 'parent') {
                        $tree .= "<li data-jstree='{\"opened\": true}' value='" . $value . "'>" . $value;
                        $child = \app\models\Tourtype::find()->where(['parent' => $tourType->parent])->all();
                        if (count($child)) {
                            $ul = $this->ul($child);
                            $tree .= $ul;
                        }

                        $tree .= "</li>";
                    }
                }
            }
        }
        $tree .= "</ul>";

        $tourType = new Tourtype();
        $small = new FileUpload();

        if ($tourType->load(Yii::$app->request->post()) && $tourType->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            'model' => $tourType,
            'small' => $small,
            'tree' => $tree,
        ]);
    }

    /**
     * Displays a single Tourtype model.
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
     * Creates a new Tourtype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tourtype();
        $small = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'small' => $small,
            ]);
        }
    }

    /**
     * Updates an existing Tourtype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $small = new FileUpload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'small' => $small,
            ]);
        }
    }

    /**
     * Deletes an existing Tourtype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //return $this->redirect(['view', 'id' => $model->id]);
        return $this->redirect(['index']);
    }

    /*
     * Render ajax tour type
    */
    public function actionGetTour($tourtype){
        $model = Tourtype::find()->where(['parent' => $tourtype])->all();

        return $this->renderAjax('get-tour', ['model' => $model]);
    }

    /**
     * Finds the Tourtype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tourtype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tourtype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function ul($model)
    {
        $parent = "<ul>";
        foreach ($model as $tourType) {
            foreach ($tourType as $key => $value) {
                //$id = 0;

                if($key == 'id'){
                    $id = $value;
                    $view = Url::to(['tourtype/view', 'id' => $id]);
                    $update = Url::to(['tourtype/update', 'id' => $id]);
                    $delete = Url::to(['tourtype/delete', 'id' => $id]);
                }
                if ($key == 'name'){
                    $parent .= "<li value='" . $value . "'>" . $value . ' ( ' . Yii::$app->db->createCommand('select count(id) from tour where id_tourtype = ' . $id)->queryAll()[0]['count(id)'] . ' )';
                    $parent .= "<div class='action sr-only'>
    <a href='$view' data-method='post' class='text-success'>
        <span class='glyphicon glyphicon-eye-open'></span>
    </a>
    <a href='$update' data-method='post' class='text-success'>
        <span class='glyphicon glyphicon-pencil'></span>
    </a>
    <a href='$delete' data-confirm='Are you sure you want to delete this item?' data-method='post' class='text-danger'>
        <span class='glyphicon glyphicon-trash'></span>
    </a>
</div>";

                    $child = \app\models\Tourtype::find()->where(['parent' => $value])->all();
                    if(count($child)){
                        $ul = $this->ul($child);
                        $parent .= $ul;
                    }
                    $parent .= "</li>";
                }
            }
        }
        $parent .= "</ul>";

        return $parent;
    }
}
