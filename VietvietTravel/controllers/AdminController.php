<?php 

	namespace app\controllers;

	use Yii;
	use yii\filters\AccessControl;
	use yii\web\Controller;
	use yii\filters\VerbFilter;
	use app\models\LoginForm;
	use app\components\AccessRule;
	use app\models\User;

	class AdminController extends Controller{
		public $defaultAction = "index";
		public $layout = "admin";
		public $defaultRoute = "admin";

		public function behaviors(){
	        return [
	            'access' => [
	                'class' => AccessControl::className(),
					'ruleConfig' => [
						'class' => AccessRule::className(),
					],
	                'only' => ['logout', 'index', 'login', 'tour', 'hotel', 'about'],
	                'rules' => [
	                    [
	                        'actions' => ['logout', 'index'],
	                        'allow' => true,
	                        'roles' => [
								User::ROLE_ADMIN,
								User::ROLE_USER
							],
	                    ],
						[
							'actions' => ['tour', 'hotel', 'about'],
							'allow' => true,
							'roles' => [
								User::ROLE_ADMIN
							],
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
			//return $this->render("index");
			return $this->redirect(['infocompany/view', 'id' => 1]);
		}

		public function actionAbout(){
			if(isset($_POST["submit"])){
				echo $_POST["mytext"];
				die();
			}
			return $this->render("about");
		}

		public function actionHotel(){
			echo "hotel action admin";
		}

		public function actionLogin(){
			$this->layout = "admin-login";
	        if (!\Yii::$app->user->isGuest) {
	            return $this->redirect(['infocompany/update', 'id' => 1]);
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

	        return $this->redirect(['admin/login']);
	    }

		public function actionTour(){
			echo "tour controller";
		}

	}

 ?>