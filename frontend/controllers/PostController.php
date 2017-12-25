<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 16:03
 */

namespace frontend\controllers;

use common\classes\Debug;
use frontend\models\Post;

class PostController extends FrontEndController
{
    public function actionView($slug)
    {
        $post = Post::find()->where(['slug' => $slug])->with(['categories'])->one();
        $post->updateCounters(['views' => 1]);

        if(!$post->postView){
            $post->setUserView();
        }

        return $this->render('view', ['post' => $post]);
    }
}