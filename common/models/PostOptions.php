<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post_options".
 *
 * @property integer $post_id
 * @property integer $views
 * @property integer $comment_count
 * @property integer $likes
 * @property integer $dislikes
 * @property integer $favorites_count
 *
 * @property Post $post
 */
class PostOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'required'],
            [['post_id', 'views', 'comment_count', 'likes', 'dislikes', 'favorites_count'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'views' => 'Views',
            'comment_count' => 'Comment Count',
            'likes' => 'Likes',
            'dislikes' => 'Dislikes',
            'favorites_count' => 'Favorites Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
