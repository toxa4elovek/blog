<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 23.12.2017
 * Time: 11:44
 */

namespace frontend\controllers;


use common\classes\Debug;
use common\models\db\PostLikes;
use frontend\models\Post;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class LikesController extends FrontEndController
{
    public $layout = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['like', 'dislike'],
                'rules' => [
                    [
                        'actions' => ['like', 'dislike'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'like' => ['post'],
                    'dislike' => ['post']
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionLike()
    {
        $id = \Yii::$app->request->post('id');

        if(\Yii::$app->user->isGuest){
            return json_encode(['error' => \Yii::t('app', 'Please log in')]);
        }

        $post = Post::findOne(['id' => $id]);

        if(!empty($post)){
            /**@var $post->like PostLikes*/
            $post->like = PostLikes::TYPE_LIKE;
            return json_encode(['success' => $post->like->save(), 'value' => $post->getDifferenceCountLikes()]);
        }

        return json_encode(['error' => \Yii::t('app', "This Post doesn't exists")]);
    }

    /**
     * @return string
     */
    public function actionDislike()
    {
        $id = \Yii::$app->request->post('id');

        if(\Yii::$app->user->isGuest){
            return json_encode(['error' => \Yii::t('app', 'Please log in')]);
        }

        $post = Post::findOne(['id' => $id]);

        if(!empty($post)){
            /**@var $post->like PostLikes*/
            $post->like = PostLikes::TYPE_DISLIKE;
            return json_encode(['success' => $post->like->save(), 'value' => $post->getDifferenceCountLikes()]);
        }

        return json_encode(['error' => \Yii::t('app', "This Post doesn't exists")]);
    }
}