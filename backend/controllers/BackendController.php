<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 14.11.2017
 * Time: 21:18
 */

namespace backend\controllers;


use common\classes\Debug;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;

class BackendController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['backend/error']);
                },
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ]
                ],
            ],
        ]);
    }

    public function actionError()
    {
        return $this->redirect(\Yii::$app->urlManagerFront->createUrl('/'));
    }
}