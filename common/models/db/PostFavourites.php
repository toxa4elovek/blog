<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 23.12.2017
 * Time: 11:00
 */

namespace common\models\db;


class PostFavourites extends \common\models\PostFavourites
{

    public function __construct(array $config = [])
    {
        if(!\Yii::$app->user->isGuest){
            $this->user_id = \Yii::$app->user->id;
        }

        parent::__construct($config);
    }

}