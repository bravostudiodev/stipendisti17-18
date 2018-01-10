<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNikolinaLjuboja()
    {
	return  $this->render('nikolinaLjuboja');
    }

    public function actionStefanDelic()
    {
        return $this->render('stefandelic');

    }

	
	public function actionMirkoKuridza()
    {
	return $this->render('MirkoKuridza');
    }

    public function actionBrankoBunic()
    {
        return $this->render('brankoBunic');
    }
	
	public function actionNemanjaStokuca()
    {
        return $this->render('nemanjastokuca');
	}
    
	
	public function actionBorislavBosnic()
    {
		return $this->render('borislavbosnic');

    }

	public function actionDraganIlic()
	{
		return $this->render('draganIlic');
	}

	public function actionPetarstojanovic()
	{
		return $this->render('petarStojanovic');
	}
	
	public function actionDuskoDimitric()
	{
		return $this->render('duskoDimitric');
	}

	public function actionDraganDjuric()
	{
		return $this->render('dragandjuric');
	}
	
        public function actionPetak()
    {

       return $this->render('petak',['text' => "Jeste petak!"]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
