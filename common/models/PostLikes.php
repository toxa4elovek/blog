<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_likes".
 *
 * @property integer $post_id
 * @property integer $user_id
 * @property integer $like
 *
 * @property Post $post
 * @property User $user
 */
class PostLikes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_likes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'required'],
            [['post_id', 'user_id', 'like'], 'integer'],
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
            'like' => Yii::t('app', 'Like'),
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
