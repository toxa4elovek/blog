<?php

namespace backend\modules\user\controllers;

use backend\controllers\BackendController;
use backend\modules\user\models\HigherEducationForm;
use common\models\db\User;
use common\models\db\University;
use Yii;
use common\models\db\HigherEducation;
use backend\modules\user\models\HigherEducationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HigherEducationController implements the CRUD actions for HigherEducation model.
 */
class HigherEducationController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HigherEducation models.
     * @param $user_id
     * @return mixed
     */
    public function actionIndex($user_id)
    {
        $searchModel = new HigherEducationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $user_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => User::findOne($user_id),
        ]);
    }

    /**
     * Displays a single HigherEducation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HigherEducation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $user_id
     * @return mixed
     */
    public function actionCreate($user_id)
    {
        $model = new HigherEducationForm([
            'user_id' => $user_id
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'user_id' => $model->user->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $model->user
        ]);
    }

    /**
     * Updates an existing HigherEducation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'user_id' => $model->user->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $model->user
        ]);
    }

    /**
     * Deletes an existing HigherEducation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return string
     */
    public function actionUniversityList()
    {
        $universities = University::findAll(['city_id' => Yii::$app->request->post('depdrop_parents')[1]]);

        $result = [];
        foreach ($universities as $university) {
            $result[] = [
                'id' => $university->id,
                'name' => $university->name
            ];
        }

        return json_encode(['output' => $result, 'selected' => '']);
    }

    /**
     * Finds the HigherEducation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HigherEducation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HigherEducationForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
