<?php
/**
 *
 */

namespace backend\modules\post\controllers;


use common\classes\Debug;
use common\models\db\Post;
use yii\web\Controller;

class QuestionController extends Controller
{
    public function actionCreate ()
    {
        $model = new Post(['type' => Post::TYPE_QUESTION]);

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/post/post/index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}