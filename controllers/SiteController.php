<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\RegisterForm;
use app\models\User;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

    public function actionRegister()
    {
        $model = new RegisterForm();

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                
                $model->photo = UploadedFile::getInstance($model, 'imageFile');

                if ($user = $model->register()) {
                    if (Yii::$app->user->login($user)) {
                        // return $this->goHome();
                        return Yii::$app->response->redirect(['site/profile']);
                    }
                }
            }
        }

        return $this->render('register', compact('model'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
            return Yii::$app->response->redirect(['site/profile']);
        }

        $model->password = '';
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
    public function actionProfile()
    {
        $model = new User();
        if (Yii::$app->request->isPost) {
            if (!is_null(Yii::$app->request->post('photo-button'))) {
                $file = UploadedFile::getInstance($model, 'photo');
                if ($model->changePhoto($file)) {
                    return Yii::$app->response->redirect(['site/profile']);
                }
                // VarDumper::dump($file, 10, true);die;
            }
            
        }
        return $this->render('profile', compact('model'));
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

    public function actionWhereFind()
    {
        return $this->render('whereFind');
    }

    public function actionMyTestPage()
    {
        return $this->render('camelCase');
    }


}
