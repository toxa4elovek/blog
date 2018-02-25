<?php

namespace frontend\modules\pages\controllers;

use common\classes\Debug;
use common\models\db\PostLikes;
use console\models\VkApi;
use frontend\helpers\RecursiveHelper;
use frontend\models\Post;
use frontend\controllers\FrontEndController;
use yii\data\ActiveDataProvider;


class PagesController extends FrontEndController
{
    public function actionIndex()
    {
        $_GET = $_POST;
        $postDataProvider = new ActiveDataProvider([
            'query' => Post::find()->where(['status' => Post::STATUS_ACTIVE])->with(['categories', 'user', 'userLike']),
            'pagination' => [
                'pageSize' => 3
            ]
        ]);

        if (\Yii::$app->request->isAjax) {
            return $this->renderPartial('@frontend/widgets/views/blocks/_loop', ['postDataProvider' => $postDataProvider]);
        }

        $posts = Post::find()->where(['status' => Post::STATUS_ACTIVE])->with(['categories', 'user', 'userLike'])->all();

        $sliderItems = [];

        foreach ($posts as $post) {
            $sliderItems[] = $this->renderPartial('@frontend/widgets/views/blocks/slider_item', ['post' => $post]);
        }

        return $this->render('index', [
            'sliderItems' => $sliderItems,
            'posts' => $posts,
            'postDataProvider' => $postDataProvider
        ]);
    }

}
