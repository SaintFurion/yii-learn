<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sites".
 *
 * @property int $id
 * @property string $title
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $domain_id
 * @property int|null $server_id
 *
 * @property Domains $domain
 * @property Servers $server
 */
class Sites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'domain_id', 'server_id'], 'integer'],
            [['title'], 'string', 'max' => 12],
            [['domain_id'], 'exist', 'skipOnError' => true, 'targetClass' => Domains::class, 'targetAttribute' => ['domain_id' => 'id']],
            [['server_id'], 'exist', 'skipOnError' => true, 'targetClass' => Servers::class, 'targetAttribute' => ['server_id' => 'id']],
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
            'domain_id' => 'Domain ID',
            'server_id' => 'Server ID',
        ];
    }

    /**
     * Gets query for [[Domain]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domains::class, ['id' => 'domain_id']);
    }

    /**
     * Gets query for [[Server]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServer()
    {
        return $this->hasOne(Servers::class, ['id' => 'server_id']);
    }
}
