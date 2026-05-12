<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property string $auth_key
 * @property int $role
 */
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'default', 'value' => 0],
            [['login', 'password', 'full_name', 'email', 'phone'], 'required'],
            [['role'], 'integer'],
            [['login', 'password', 'full_name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 17],
            [['password'], 'string', 'min' => 6, 'message' => 'Не менее 6 символов'],
            [['login'], 'unique'],
            ['email', 'email'],
            [['full_name'], 'match', 'pattern' => '/^[а-яё\s]+$/ui', 'message' => 'Только символы кириллицы и пробелы'],
            [['phone'], 'match', 'pattern' => '/^\+7\([\d]{3}\)[\d]{3}-[\d]{2}-[\d]{2}$/', 'message' => 'Номер в формате +7(ххх)ххх-хх-хх'],
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
            'full_name' => 'ФИО',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'auth_key' => 'Auth Key',
            'role' => 'Role',
        ];
    }

    public static function findByUsername($login){
        return static::findOne(['login' => $login]) ?? false;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getIsAdmin()
    {
        return $this->role === 1;
    }

}
