<?php

namespace frontend\modules\pages\controllers;

use common\classes\Debug;
use common\models\db\PostLikes;
use console\models\VkApi;
use frontend\helpers\RecursiveHelper;
use frontend\models\Post;
use frontend\controllers\FrontEndController;


class PagesController extends FrontEndController
{
    public function actionIndex()
    {
        $model = new VkApi();
        Debug::dd($model->getRegions(2));
        $posts = Post::find()->where(['status' => Post::STATUS_ACTIVE])->with(['categories', 'user', 'userLike'])->all();

        $sliderItems = [];
        $postOne = Post::find()->where(['id' => 1])->with('comments')->one();
//        $result = RecursiveHelper::recursiveComments($postOne->comments);
//        Debug::dd($result);
        foreach ($posts as $post) {
            $sliderItems[] = $this->renderPartial('@frontend/widgets/views/blocks/slider_item', ['post' => $post]);
        }

        return $this->render('index', ['sliderItems' => $sliderItems, 'posts' => $posts]);
    }

}
