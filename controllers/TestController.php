<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\UserTest;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex() {
        $arr = [1, '2', true, false, [0, 9]];

        return $this->render('test', [
            'data' => 24,
            'func' => function() {
                return 'qwerty';
            },
            'arr' => $arr,

        ]);
    }

    public function actionTest() {
        // echo "Long live the Milky Way!";
        return $this->render('no_test');
    }

    public function actionNoTest() {
        return $this->render('no_test');
    }

    public function actionNoMyPage() {
        return $this->render('@app/views/site/about');
    }

    public function actionRegister() {
        $model = new RegisterForm();
        // VarDumper::dump($model->attributes, 10, true);die;
        // if (Yii::$app->request->isPost) {
        //     VarDumper::dump(Yii::$app->request->post(), 10, true);
        // }
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                // VarDumper::dump($model->attributes, 10, true);
                // $user = new UserTest();
                // $user->login = $model->login;
                // $user->password = Yii::$app->security->generatePasswordHash($model->password);
                // $user->authKey = Yii::$app->security->generateRandomString();
                // if ($user->save() && Yii::$app->user->login($user)) {
                //     return $this->goHome();
                // }
                if ($user = $model->register()) {
                    if (Yii::$app->user->login($user)) {
                        return $this->goHome();
                    }
                }
            }
        }

        return $this->render('register', compact('model'));
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionContact() {
        return $this->render('whereFind');
    }
}