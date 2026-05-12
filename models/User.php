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
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
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
            [['login'], 'unique'],
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

}
