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
 * @property string $cantact
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
            [['user_id', 'service_id', 'address', 'cantact', 'date', 'time', 'pay_type_id', 'status_id'], 'required'],
            [['user_id', 'service_id', 'pay_type_id', 'status_id'], 'integer'],
            [['created_at', 'date', 'time'], 'safe'],
            [['address'], 'string', 'max' => 255],
            [['cantact'], 'string', 'max' => 17],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'service_id' => 'Service ID',
            'address' => 'Address',
            'cantact' => 'Cantact',
            'date' => 'Date',
            'time' => 'Time',
            'pay_type_id' => 'Pay Type ID',
            'status_id' => 'Status ID',
        ];
    }

}
