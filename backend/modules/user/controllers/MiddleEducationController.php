<?php

namespace backend\modules\user\controllers;

use backend\modules\user\models\MiddleEducationForm;
use common\classes\Debug;
use common\models\db\School;
use common\models\db\User;
use Yii;
use common\models\db\MiddleEducation;
use backend\modules\user\models\MiddleEducationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MiddleEducationController implements the CRUD actions for MiddleEducation model.
 */
class MiddleEducationController extends Controller
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
     * Lists all MiddleEducation models.
     * @param $user_id
     * @return mixed
     */
    public function actionIndex($user_id)
    {
        $searchModel = new MiddleEducationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $user_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => User::findOne($user_id)
        ]);
    }

    /**
     * Displays a single MiddleEducation model.
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
     * Creates a new MiddleEducation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $user_id
     * @return mixed
     */
    public function actionCreate($user_id)
    {
        $model = new MiddleEducationForm(['user_id' => $user_id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $model->user
        ]);
    }

    /**
     * Updates an existing MiddleEducation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $model->user
        ]);
    }

    /**
     * Deletes an existing MiddleEducation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index', 'user_id' => $model->user->id]);
    }

    /**
     * @return string
     */
    public function actionSchoolList()
    {
        $q = '';

        if(!empty(Yii::$app->request->post('q'))){
            $q = Yii::$app->request->post('q');
        }
        $schools = School::find()->where(['city_id' => Yii::$app->request->post('depdrop_parents')[1]])
            ->andWhere(['like', 'name', $q])->all();

        $result = [];
        foreach ($schools as $school) {
            $result[] = [
                'id' => $school->id,
                'name' => $school->name
            ];
        }

        return json_encode(['output' => $result, 'selected' => '']);
    }

    /**
     * Finds the MiddleEducation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MiddleEducation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MiddleEducationForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
