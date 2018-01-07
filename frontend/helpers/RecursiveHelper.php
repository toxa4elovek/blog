<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 25.12.2017
 * Time: 20:39
 */

namespace frontend\helpers;


use common\classes\Debug;
use common\models\db\PostComments;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class RecursiveHelper extends BaseObject
{
    /**
     * @param $parent_id integer
     * @param $comments PostComments[]
     * @return array
     */
    public static function recursiveComments($comments, $parent_id = 0)
    {
       // ArrayHelper::multisort($comments, 'parent_id');
        $result =[];

        foreach ($comments as $comment){
            if($comment->parent_id === $parent_id) {
                $result[$comment->id] = $comment;
                $result[$comment->id]->child = self::recursiveComments($comments, $comment->id);
            }
        }

        return $result;
    }

}