<?php

namespace frontend\modules\pages\controllers;

use common\classes\Debug;
use common\models\db\PostLikes;
use frontend\models\Post;
use frontend\controllers\FrontEndController;


class PagesController extends FrontEndController
{
    public function actionIndex()
    {
        $posts = Post::find()->where(['status' => Post::STATUS_ACTIVE])->with(['categories', 'user', 'userLike'])->all();

        $sliderItems = [];
        Debug::prn($posts[0]->userLike);
        foreach ($posts as $post) {
            $sliderItems[] = $this->renderPartial('@frontend/widgets/views/blocks/slider_item', ['post' => $post]);
        }

        return $this->render('index', ['sliderItems' => $sliderItems, 'posts' => $posts]);
    }

}
