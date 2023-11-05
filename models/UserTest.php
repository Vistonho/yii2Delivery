<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user_test".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 */
class UserTest extends \yii\db\ActiveRecord implements IdentityInterface
{
    // static $authKey;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password', 'authKey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    // Созданные

    public static function findByUsername($login)
    {
        return self::findOne(['login' => $login]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
