<?php

namespace frontend\modules\profile\controllers;

use common\classes\Debug;
use common\models\db\Post;
use common\models\db\PostComments;
use common\models\db\User;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `profile` module
 */
class ProfileController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user = User::find()/*->with('higherEducation', 'middleEducation', 'profile')*/
            ->where(['id' => \Yii::$app->user->id])->one();
        return $this->render('index', [
            'user' => $user,
            'educations' => $user->currentEducations,
            'postDataProvider' => $this->createDataProvider(Post::find()->where([
                'user_id' => $user->id,
                'type' => Post::TYPE_POST
            ])),
            'commentDataProvider' => $this->createDataProvider(Post::find()->where([
                'post_comments.user_id' => $user->id
            ])->joinWith('comments'))
        ]);
    }

    private function createDataProvider(ActiveQuery $query)
    {

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        return $dataProvider;
    }

    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $profile = $user->profile;
        $post = \Yii::$app->request->post();
        $isLoad = $user->load($post) && $profile->load($post);

        if ($isLoad && $user->save() && $profile->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Account details have been updated'));
        }

        return $this->render('elements/__main', [
            'user' => $user,
        ]);
    }

    public function actionUpdateEducation($user_id)
    {

    }


    private function findModel($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }
}
