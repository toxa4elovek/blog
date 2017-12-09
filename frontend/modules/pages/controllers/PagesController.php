<?php

namespace frontend\modules\pages\controllers;

use common\classes\Debug;
use common\models\Post;
use frontend\controllers\FrontEndController;


class PagesController extends FrontEndController
{
    public function actionIndex()
    {
        $posts = Post::find()->where(['status' => Post::STATUS_ACTIVE])->with(['categories', 'user'])->all();

        $sliderItems = [];

        foreach ($posts as $post) {
            $sliderItems[] = $this->renderPartial('@frontend/widgets/views/blocks/slider_item', ['post' => $post]);
        }

        //Debug::prn($sliderItems);
        return $this->render('index', ['sliderItems' => $sliderItems, 'posts' => $posts]);
    }

}
