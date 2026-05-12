<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Feedback".
 *
 * @property int $application_id
 * @property string $comment
 */
class Feedback extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'comment'], 'required'],
            [['application_id'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'Application ID',
            'comment' => 'Comment',
        ];
    }

}
