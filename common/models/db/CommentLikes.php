<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 27.12.2017
 * Time: 21:33
 */

namespace common\models\db;


class CommentLikes extends \common\models\CommentLikes
{
    const TYPE_LIKE  = 1;
    const TYPE_DISLIKE = 0;

    public function beforeValidate()
    {
        if(!\Yii::$app->user->isGuest && empty($this->user_id)){
            $this->user_id = \Yii::$app->user->id;
        }

        return parent::beforeValidate();
    }
}