<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Application".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 * @property int $service_id
 * @property string $address
 * @property string $contact
 * @property string $date
 * @property string $time
 * @property int $pay_type_id
 * @property int $status_id
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'address', 'contact', 'date', 'time', 'pay_type_id', 'status_id'], 'required'],
            [['user_id', 'service_id', 'pay_type_id', 'status_id'], 'integer'],
            [['created_at', 'date', 'time'], 'safe'],
            [['address'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 17],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'created_at' => 'Created At',
            'service_id' => 'Тип услуги',
            'address' => 'Адрес',
            'contact' => 'Контактные данные',
            'date' => 'Дата',
            'time' => 'Время',
            'pay_type_id' => 'Тип оплаты',
            'status_id' => 'Статус',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
    public function getPayType()
    {
        return $this->hasOne(PayType::class, ['id' => 'pay_type_id']);
    }
}


