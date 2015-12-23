<?php 

	namespace app\controllers;

	use Yii;
	use yii\filters\AccessControl;
	use yii\web\Controller;
	use yii\filters\VerbFilter;
	use app\models\LoginForm;

	class AdminController extends Controller{
		public $defaultAction = "login";
		public $layout = "admin";
		public $defaultRoute = "admin";

		public function behaviors(){
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
	                'only' => ['logout', 'index', 'about', 'login'],
	                'rules' => [
	                    [
	                        'actions' => ['logout', 'index', 'about'],
	                        'allow' => true,
	                        'roles' => ['@'],
	                    ],
	                    [
	                    	'actions' => ['login'],
	                    	'allow' => true,
	                    	'roles' => ['?'],
	                    ],
	                ],
	            ],
	            'verbs' => [
	                'class' => VerbFilter::className(),
	                'actions' => [
	                    'logout' => ['post'],
	                ],
	            ],
	        ];
	    }

		public function actionIndex(){
			return $this->render("index");
		}

		public function actionAbout(){
			if(isset($_POST["submit"])){
				echo $_POST["mytext"];
				die();
			}
			return $this->render("about");
		}

		public function acionHotel(){

		}

		public function actionLogin(){
			$this->layout = "admin-login";
	        if (!\Yii::$app->user->isGuest) {
	            return $this->redirect("?r=admin/index");
	        }

	        $model = new LoginForm();
	        if ($model->load(Yii::$app->request->post()) && $model->login()) {
	            return $this->goBack();
	        }
	        return $this->render('login', [
	            'model' => $model,
	        ]);
	    }
	    public function actionLogout(){
	        Yii::$app->user->logout();

	        return $this->redirect("?r=admin/login");
	    }

	}

 ?>