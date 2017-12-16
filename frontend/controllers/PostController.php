<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 16:03
 */

namespace frontend\controllers;

use frontend\models\Post;

class PostController extends FrontEndController
{
    public function actionView($slug)
    {
        $post = Post::find()->where(['slug' => $slug])->with(['options', 'categories'])->one();
        $post->options->updateCounters(['views' => 1]);

        return $this->render('view', ['post' => $post]);
    }
}