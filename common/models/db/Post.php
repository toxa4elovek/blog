<?php

namespace common\models\db;

use Yii;

/**
 * @property PostLikes->like $userLikeValue
 * @property PostLikes $userLike
 * Class Post
 * @package common\models\db
 */
class Post extends \common\models\Post
{
    const STATUS_ACTIVE = 1;
    const STATUS_MODERATION = 0;
    const STATUS_DELETED = 2;

    /**
     * @param $value
     */
    public function setUserLike($value)
    {
        $this->userLike = $value;
    }

    /**
     * @param $value
     */
    public function setUserLikeValue($value)
    {
        if(!empty($this->userLike)){
            $this->userLike->like = $value;
        }else{
            $this->userLike = $this->createUserLike($value);
        }
    }

    /**
     * @param $value
     * @return PostLikes
     */
    public function createUserLike($value)
    {
        $like = new PostLikes();
        $like->setAttributes([
            'post_id' => $this->id,
            'user_id' => Yii::$app->user->id,
            'like' => $value
        ]);

        return $like;
    }

    /**
     * @return int|string
     */
    public function getUserLike()
    {
        return $this->hasOne(PostLikes::className(), ['post_id' => 'id'])->where(['user_id' => Yii::$app->user->id]);
    }

    /**
     * @return mixed
     */
    public function getDifferenceCountLikes()
    {
        $count = Yii::$app->getDb()->createCommand(
            "SELECT t1.count - t2.count as count FROM 
            (SELECT COUNT(*) as count FROM `post_likes` WHERE `post_id` = {$this->id} AND `like` = 1) as t1, 
            (SELECT COUNT(*) as count FROM `post_likes` WHERE `post_id` = {$this->id} AND `like` = 0) as t2 ");
        $count = $count->queryOne();

        return $count['count'];
    }

}
