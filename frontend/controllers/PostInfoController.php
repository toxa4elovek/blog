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

class PostInfoController extends FrontEndController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['like', 'favourites'],
                'rules' => [
                    [
                        'actions' => ['like', 'favourites'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'like' => ['post'],
                    'favourites' => ['post']
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionLike()
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

    public function actionFavourites($id)
    {
        $post = Post::find()->where(['id' => $id])->with('userFavourite')->one();

        if(empty($post->userFavourite) && \Yii::$app->request->post('active') === 'false'){
            $post->setUserFavourite();
            return json_encode([
                'success' => (bool)$post->userFavourite->save(),
                'action' => 'save',
                'count' => $post->countFavourites
            ]);
        }else {
            return json_encode([
                'success' => (bool)$post->userFavourite->delete(),
                'action' => 'delete',
                'count' => $post->countFavourites
            ]);
        }
    }
}