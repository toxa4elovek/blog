<?php

namespace common\models\db;

use common\classes\Debug;
use Yii;


class Post extends \common\models\Post
{
    const STATUS_ACTIVE = 1;
    const STATUS_MODERATION = 0;
    const STATUS_DELETED = 2;

    private $_like;

    /**
     * @param $value PostLikes::TYPE_LIKE|PostLikes::TYPE_DISLIKE
     */
    public function setLike($value)
    {
        $this->_like = $this->like;

        if(!empty($this->_like)){
            $this->_like->like = $value;
        }else {
            $this->_like = new PostLikes();
            $this->_like->post_id = $this->id;
            $this->_like->like = $value;
        }
    }

    /**
     * @return \yii\db\ActiveRecord
     */
    public function getLike()
    {
        if(empty($this->_like)){
            return PostLikes::find()->where(['post_id' => $this->id, 'user_id' => Yii::$app->user->id])->one();
        }
        return $this->_like;

    }

    /**
     * @return int|string
     */
    public function getCountLikes()
    {
        return PostLikes::find()->where(['post_id' => $this->id, 'like' => 1])->count();
    }

    /**
     * @return int|string
     */
    public function getCountDislikes()
    {
        return PostLikes::find()->where(['post_id' => $this->id, 'like' => 0])->count();
    }

    /**
     * @return mixed
     */
    public function getDifferenceCountLikes()
    {
        $user_id = Yii::$app->user->id;
        $count = Yii::$app->getDb()->createCommand(
            "SELECT t1.count - t2.count as count FROM 
            (SELECT COUNT(*) as count FROM `post_likes` WHERE `user_id` = {$user_id} AND `post_id` = {$this->id} AND `like` = 1) as t1, 
            (SELECT COUNT(*) as count FROM `post_likes` WHERE `user_id` = {$user_id} AND `post_id` = {$this->id} AND `like` = 0) as t2 ");
        $count = $count->queryOne();

        return $count['count'];
    }

}
