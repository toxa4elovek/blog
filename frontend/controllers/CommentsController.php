<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 25.12.2017
 * Time: 20:08
 */

namespace frontend\controllers;


use common\classes\Debug;
use common\models\db\PostComments;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class CommentsController extends FrontEndController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add', 'favourites'],
                'rules' => [
                    [
                        'actions' => ['add', 'favourites'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add' => ['post'],
                    'favourites' => ['post']
                ],
            ],
        ];
    }

    public function actionAdd()
    {
        $comment = New PostComments();
        $comment->setAttributes(array_merge(
            \Yii::$app->request->post(),
            ['user_id' => \Yii::$app->user->id]
            ));

        if(!empty($comment->text) && $comment->save()){
            $comment = PostComments::findOne($comment->id);
            $html = $this->renderPartial('@frontend/views/blocks/_comments-level', ['comment' => $comment]);

            return json_encode(['result' => true, 'html' => $html]);
        }else return json_encode(['result' => false]);
    }
}