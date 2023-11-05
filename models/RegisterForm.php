<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class RegisterForm extends Model 
{
    public $login;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $phone;
    public $imageFile;
    public $photo;

    public function rules()
    {
        return [
            // [['password', 'name', 'surname', 'email', 'phone', 'password'], 'required'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            [['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password'], 'string', 'max' => 255],
            ['email', 'email'],

            [['photo'], 'file', 'skipOnEmpty' => true],
    
            // [['login'], 'match', 'pattern' => '/^(?=.*[A-Z])(?=.*[a-z]).{3,}$/'],
            // [['password'], 'match', 'pattern' => '/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{3,}$/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            // 'photo' => 'Photo',
            // 'created_at' => 'Created At',
            'imageFile' => 'Фотография',
        ];
    }

    public function register()
    {
        // VarDumper::dump(UploadedFile::getInstance($this, 'imageFile')->extension, 10, true);die;
        // VarDumper::dump($this->login, 10, true); die;

        if ($this->validate()) {

            $userFile = UploadedFile::getInstance($this, 'imageFile');

            $user = new User();
            
            $user->load($this->attributes, '');
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->role_id = Role::getRole('client');

            if ($this->photo) {
                $userFileName = Yii::$app->security->generateRandomString(5) . '.' . $this->photo->extension;
                $this->photo->saveAs('test_images/' . $userFileName);
                $user->photo = $userFileName;
            } else {
                $user->photo = 'profile.jpg';
            }
            

            if (!$user->save()) {
                VarDumper::dump($user->errors, 10, true);
            }

            return $user ?? false;
        } else {
            VarDumper::dump($this->errors, 10, true); die;
        }
    }
}
