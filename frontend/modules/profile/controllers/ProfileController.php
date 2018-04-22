<?php

namespace frontend\modules\profile\controllers;

use backend\models\File;
use common\classes\Debug;
use common\models\db\Avatar;
use common\models\db\Post;
use common\models\db\User;
use frontend\modules\profile\models\SearchForm;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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

        return $this->render('elements/_profile', [
            'user' => $user,
            'educations' => $user->currentEducations,
        ]);
    }

    public function actionPosts()
    {
        $searchModel      = new SearchForm(['type' => Post::TYPE_POST]);
        $postDataProvider = $searchModel->search(\Yii::$app->request->post());

        return $this->render('elements/_posts', [
            'searchModel' => $searchModel,
            'postDataProvider' => $postDataProvider
        ]);
    }

    public function actionQuestions()
    {
        $searchModel          = new SearchForm(['type' => Post::TYPE_QUESTION]);
        $questionDataProvider = $searchModel->search(\Yii::$app->request->post());

        return $this->render('elements/_posts', [
            'searchModel' => $searchModel,
            'postDataProvider' => $questionDataProvider
        ]);
    }

    public function actionFavourites()
    {
        $searchModel            = new SearchForm();
        $favouritesDataProvider = $searchModel->searchFavourites(\Yii::$app->request->post());

        return $this->render('elements/_posts', [
            'searchModel' => $searchModel,
            'postDataProvider' => $favouritesDataProvider
        ]);
    }

    public function actionAnswers()
    {
        $searchModel        = new SearchForm(['type' => Post::TYPE_QUESTION]);
        $answerDataProvider = $searchModel->searchComments(\Yii::$app->request->post(), 0);

        return $this->render('elements/_comments', [
            'searchModel' => $searchModel,
            'commentDataProvider' => $answerDataProvider
        ]);
    }

    public function actionComments()
    {
        $searchModel        = new SearchForm();
        $answerDataProvider = $searchModel->searchComments(\Yii::$app->request->post(), 0);

        return $this->render('elements/_comments', [
            'searchModel' => $searchModel,
            'commentDataProvider' => $answerDataProvider
        ]);
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

    public function actionUpload()
    {
        $user_id = \Yii::$app->user->id;
        $model   = Avatar::findOne(['user_id' => $user_id]);

        if (empty($model)) {
            $model = new Avatar();
        }

        $file           = UploadedFile::getInstance($model, 'file');
        $model->user_id = $user_id;
        $model->img     = File::upload($file, 'avatars');
        $path           = \Yii::getAlias('@frontend/web') . $model->img;
        $resize         = Image::resize($path, 200, 200);
        $resize->save($path);


        if ($model->save()) {
            \Yii::$app->session->setFlash('error', 'Аватар успешно загружен');

        } else {
            \Yii::$app->session->setFlash('success', 'При загрузке произошла ошибка');
        }

        return $this->redirect('/profile');
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
