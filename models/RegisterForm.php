<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public ?string $login = null;
    public ?string $password = null;
    public ?string $password_repeat = null;

    public function rules()
    {
        return [
            [['login', 'password', 'password_repeat'], 'required'],
            [['login', 'password', 'password_repeat'], 'string', 'max' => 255],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            ['login', 'unique', 'targetClass' => UserTest::class],
            
            // [['login'], 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[a-z]).{3,}$/'],
            // [['password'], 'match', 'pattern' => '/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{3,}$/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }

    public function register()
    {

        if ($this->validate()) {
            $user = new UserTest();

            // $user->login = $this->login;
            // $user->attributes = $this->attributes;
            $user->load($this->attributes, '');

            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->authKey = Yii::$app->security->generateRandomString();

            if (!$user->save()) {
                VarDumper::dump($user->errors, 10, true);
            }
        }

        return $user ?? false;

    }
}
