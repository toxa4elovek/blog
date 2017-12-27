<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 27.12.2017
 * Time: 21:41
 */

namespace frontend\controllers;


use common\classes\Debug;
use common\models\db\PostLikes;
use frontend\models\Post;
use frontend\models\PostComments;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class LikesController extends FrontEndController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['like-post', 'like-comment'],
                'rules' => [
                    [
                        'actions' => ['like-comment', 'like-post'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'like-comment' => ['post'],
                    'like-post' => ['post']
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionLikePost()
    {
        $request = \Yii::$app->request->post();

        $post = Post::find()->where(['id' => $request['id']])->with('userLike')->one();

        if(!empty($post)){
            if(!empty($post->userLike) && $request['active'] === "true"){
                return json_encode(['success' => $post->userLike->delete(), 'value' => $post->getDifferenceCountLikes()]);
            }

            $post->userLikeValue = ((int)$request['like'] > 0) ? PostLikes::TYPE_LIKE : PostLikes::TYPE_DISLIKE;
            return json_encode(['success' => $post->userLike->save(), 'value' => $post->getDifferenceCountLikes()]);
        }

        return json_encode(['error' => \Yii::t('app', "This Post doesn't exists")]);
    }

    /**
     * @return string
     */
    public function actionLikeComment()
    {
        $request = \Yii::$app->request->post();
        $comment = PostComments::find()->where(['id' => $request['id']])->with('userLike')->one();

        if(!empty($comment)){
            if(!empty($comment->userLike) && $request['active'] === "true"){
                return json_encode(['success' => $comment->userLike->delete(), 'value' => $comment->getDifferenceCountLikes()]);
            }

            $comment->userLikeValue = ((int)$request['like'] > 0) ? PostLikes::TYPE_LIKE : PostLikes::TYPE_DISLIKE;
            return json_encode(['success' => $comment->userLike->save(), 'value' => $comment->getDifferenceCountLikes()]);
        }

        return json_encode(['error' => \Yii::t('app', "This Post doesn't exists")]);
    }
}