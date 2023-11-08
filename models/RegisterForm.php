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
    public string $name;
    public string|null $login;
    public string $surname;
    public string|null $patronymic;
    public string $email;
    public string $phone;
    public string $password;
    public string $password_repeat;
    public string|null $photo;
    public bool $rules;
 
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
            ['rules', 'requiredValue' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'login' => 'Login',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'photo' => 'Photo',
            'role_id' => 'Role ID',
            'created_at' => 'Created At',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['courier_id' => 'id']);
    }

    /**
     * Gets query for [[Orders0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
}
