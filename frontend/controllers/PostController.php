<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 16:03
 */

namespace frontend\controllers;

use common\classes\Debug;
use frontend\helpers\RecursiveHelper;
use frontend\models\Post;
use yii\helpers\ArrayHelper;

class PostController extends FrontEndController
{
    public function actionView($slug)
    {
        $post = Post::find()->where(['slug' => $slug])->with(['categories', 'comments'])->one();
        $comments = $post->comments;
        $comments = RecursiveHelper::recursiveComments($comments);
        $post->setUserView();

        return $this->render('view', ['post' => $post, 'comments' => $comments]);
    }
}