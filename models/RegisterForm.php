<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string|null $login
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string|null $photo
 * @property int $role_id
 * @property string $created_at
 * @property string|null $auth_key
 *
 * @property Comment[] $comments
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Report[] $reports
 * @property Role $role
 */
class RegisterForm extends \yii\base\Model
{
    public string $name = '';
    public string|null $login = '';
    public string $surname = '';
    public string|null $patronymic = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_repeat = '';
    public string|null $photo = '';
    public bool $rules = true;
 
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'phone', 'password', 'password_repeat'], 'required'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password', 'photo'], 'string', 'max' => 255],
            [['email', 'login'], 'unique', 'targetClass' => User::class],
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Да здравствует Республика!'],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
            'password_repeat' => 'Пароль',
            'photo' => 'Фото',
            'role_id' => 'Role ID',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
    }

   
}
