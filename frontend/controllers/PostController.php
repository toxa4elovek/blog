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
        $post->updateCounters(['views' => 1]);
        $comments = $post->comments;

        $comments = RecursiveHelper::recursiveComments($comments);

        if(!$post->postView){
            $post->setUserView();
        }

//        Debug::dd($this->renderPartial('@frontend/widgets/views/_comments', ['comments' => $post->getCommentsTree(), 'post' => $post]));

        return $this->render('view', ['post' => $post, 'comments' => $comments]);
    }
}