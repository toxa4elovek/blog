<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 25.12.2017
 * Time: 20:02
 */

namespace common\models\db;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class PostComments extends \common\models\PostComments
{
    public $child;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(),[
            [['created_at', 'updated_at'], 'safe'],
        ]);
    }

    public function getChild()
    {
        return $this->child;
    }

    public function setChild($value)
    {
        $this->child =  $value;
    }

    /**
     * @return int|string
     */
    public function getUserLike()
    {
        return $this->hasOne(CommentLikes::className(), ['comment_id' => 'id'])->where(['user_id' => \Yii::$app->user->id]);
    }

    /**
     * @return mixed
     */
    public function getDifferenceCountLikes()
    {
        $count = \Yii::$app->getDb()->createCommand(
            "SELECT t1.count - t2.count as count FROM 
            (SELECT COUNT(*) as count FROM `comment_likes` WHERE `comment_id` = {$this->id} AND `like` = 1) as t1, 
            (SELECT COUNT(*) as count FROM `comment_likes` WHERE `comment_id` = {$this->id} AND `like` = 0) as t2 ");
        $count = $count->queryOne();

        return $count['count'];
    }

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
     * @return CommentLikes
     */
    public function createUserLike($value)
    {
        $like = new CommentLikes();
        $like->setAttributes([
            'comment_id' => $this->id,
            'user_id' => \Yii::$app->user->id,
            'like' => $value
        ]);

        return $like;
    }
}