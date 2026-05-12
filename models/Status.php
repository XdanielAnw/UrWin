<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Status".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 */
class Status extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['title', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
        ];
    }

    public static function getStatus()
    {
        return static::find()
            ->select('title')
            ->indexBy('id')
            ->column();
    }

    public static function getAliasStatusId($alias)
    {
        return static::findOne(['alias' => $alias])->id;
    }
}
