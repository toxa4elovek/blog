<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_views".
 *
 * @property int $post_id
 * @property int $user_id
 * @property int $ip_address
 * @property int $count
 *
 * @property Post $post
 * @property User $user
 */
class PostViews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'user_id', 'ip_address'], 'required'],
            [['count'], 'default', 'value'=> 0],
            [['post_id', 'user_id', 'ip_address', 'count'], 'integer'],
            [['post_id', 'user_id', 'ip_address'], 'unique', 'targetAttribute' => ['post_id', 'user_id', 'ip_address']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => Yii::t('app', 'Post ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'count' => Yii::t('app', 'Count'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
