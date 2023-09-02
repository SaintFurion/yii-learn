<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "servers".
 *
 * @property int $id
 * @property string $title
 * @property int $created_at
 * @property int $updated_at
 * @property string $ip_address
 *
 * @property Sites[] $sites
 */
class Servers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'ip_address'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'ip_address'], 'string', 'max' => 12],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ip_address' => 'Ip Address',
        ];
    }

    /**
     * Gets query for [[Sites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Sites::class, ['server_id' => 'id']);
    }
}
