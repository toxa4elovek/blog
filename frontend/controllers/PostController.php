<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 16:03
 */

namespace frontend\controllers;

use common\classes\Debug;
use common\models\db\Category;
use frontend\helpers\RecursiveHelper;
use frontend\models\Post;
use frontend\models\PostSearch;
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

    public function actionSearch($slug)
    {
        $searchModel  = new PostSearch();
        $dataProvider = $searchModel->search(array_merge(\Yii::$app->request->queryParams, \Yii::$app->request->post()));
        $category = Category::findOne(['slug' => $slug]);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => $category
        ]);
    }
}