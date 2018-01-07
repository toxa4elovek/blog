<?php

namespace common\models\db;

use frontend\helpers\RecursiveHelper;
use Yii;
use yii\db\ActiveQuery;


/**
 * @property PostLikes->like $userLikeValue
 * @property PostLikes $userLike
 * @property integer $countViews
 * @property PostViews $postView
 * @property PostFavourites $userFavourite
 * @property integer $countFavourites
 * @property integer $views
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

    /**
     * @return ActiveQuery
     */
    public function getPostView()
    {
        return $this->hasOne(PostViews::className(), ['post_id' => 'id'])
            ->where(['ip_address' => ip2long('123.12.12.12'/*\Yii::$app->request->userIP*/)]);
    }

    /**
     * Сохранение уникального просмотра
     */
    public function setUserView()
    {
        if(empty($this->postView)){
           $view = New PostViews();
           $view->post_id = $this->id;
           $view->save();
        }
    }

    /**
     * @return int
     */
    public function getCountUserViews()
    {
        return count($this->postViews);
    }

    /**
     * @return ActiveQuery
     */
    public function getUserFavourite()
    {
        return $this->hasOne(PostFavourites::className(), ['post_id' => 'id'])->where(['user_id' => Yii::$app->user->id]);
    }

    public function setUserFavourite()
    {
        $this->userFavourite = new PostFavourites();
        $this->userFavourite->setAttributes([
            'post_id' => $this->id,
            'user_id' => Yii::$app->user->id
        ]);
    }

    public function getCountFavourites()
    {
        return count($this->postFavourites);
    }

    /**
     * @return ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(PostComments::className(), ['post_id' => 'id'])->orderBy('created_at DESC');
    }

    public function getCommentsTree()
    {
        return RecursiveHelper::recursiveComments($this->comments);
    }

}
