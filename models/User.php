<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
 *
 * @property Comment[] $comments
 * @property Order[] $orders
 * @property Order[] $orders0
 * @property Report[] $reports
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'phone', 'password', 'role_id'], 'required'],
            [['role_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password', 'photo', 'auth_key'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['login'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
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

    // Identity

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
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
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

    /* 
    Публичные методы для назначения роли
    */

    public function getIsAdmin() :bool
    {
        return (Yii::$app->user->identity->role_id ==  Role::getRole('admin')) ? true : false;
    }

    public function getIsManager() :bool
    {
        return (Yii::$app->user->identity->role_id ==  Role::getRole('manager')) ? true : false;
    }

    public function getIsCourier() :bool
    {
        return (Yii::$app->user->identity->role_id ==  Role::getRole('courier')) ? true : false;
    }

    // Изменение фото

    public function changePhoto($data) {
        $model = self::findOne(Yii::$app->user->identity->id);
        $userFileName = Yii::$app->security->generateRandomString(5) . '.' . $data->extension;
        $data->saveAs('test_images/' . $userFileName);
        $model->photo = $userFileName;
        // var_dump($model);die;
        return $model->save() ? true : false;
    }

}
