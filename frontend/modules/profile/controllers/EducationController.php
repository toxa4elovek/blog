<?php

namespace frontend\modules\profile\controllers;

use common\classes\Debug;
use common\models\db\City;
use common\models\db\EducationPlace;
use Yii;
use common\models\db\Education;
use frontend\modules\profile\models\EducationSearch;
use yii\base\Model;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\db\User;

/**
 * EducationController implements the CRUD actions for Education model.
 */
class EducationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                /*'actions' => [
                    'delete' => ['POST'],
                ],*/
            ],
        ];
    }

    /**
     * Lists all Education models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EducationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Education model.
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
     * Creates a new Education model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Education();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddForm()
    {
        $educations = Yii::$app->request->post('Education');
        $user = Yii::$app->user->identity;
        $updateModels = $this->saveEducations($educations);

        $updateModels[] = new Education(['user_id' => $user->id]);

        return $this->renderAjax('../profile/elements/__education', [
            'educations' => $updateModels,
            'user' => $user
        ]);
    }

    /**
     * Updates an existing Education model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $educations = Yii::$app->request->post('Education');
        $updateModels = $this->saveEducations($educations);

        return $this->renderAjax('../profile/elements/__education', [
            'educations' => $updateModels,
            'user' => Yii::$app->user->identity
        ]);
    }

    /**
     * @param array $educations
     * @return array
     */
    private function saveEducations(array $educations)
    {
        $transaction = Yii::$app->getDb()->beginTransaction();
        $updateModels = [];

        try {
            foreach ($educations as $education) {
                if (!empty($education['id'])) {
                    $model = Education::findOne($education['id']);
                    $model->setAttributes($education);
                } else {
                    $model = new Education($education);
                }

                if ($model->save()) {
                    $updateModels[] = $model;
                }
            }
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Данные сохранены');
        } catch (Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $updateModels;
    }

    /**
     * Deletes an existing Education model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id = null)
    {
        $educations = $this->saveEducations(Yii::$app->request->post('Education'));

        /** @var $education Education*/

        if ($id !== null) {
            foreach ($educations as $key => $education) {
                if ($education->id === (int)$id) {
                    $education->delete();
                    unset($educations[$key]);
                }
            }
        }

        if (count($educations) === 0) {
            $educations[] = new Education(['user_id' => Yii::$app->user->id]);
        }

        return $this->renderAjax('../profile/elements/__education', [
            'educations' => $educations,
            'user' => Yii::$app->user->identity
        ]);
    }


    public function actionCityList()
    {
        $post =  Yii::$app->request->post('depdrop_parents');
        $cities = City::findAll(['is_main' => 1, 'country_id' => $post[0]]);
        $result = [];

        foreach ($cities as $city) {
            $result[] = [
                'id' => $city->id,
                'name' => $city->name
            ];
        }

        return json_encode(['output' => $result, 'selected' => '']);
    }

    /**
     * @return string
     */
    public function actionUniversityList()
    {
        $post =  Yii::$app->request->post('depdrop_parents');

        $educationPlaces = EducationPlace::findAll(['city_id' => $post[0], 'type' => $post[1]]);

        $result = [];
        foreach ($educationPlaces as $educationPlace) {
            $result[] = [
                'id' => $educationPlace->id,
                'name' => $educationPlace->name
            ];
        }

        return json_encode(['output' => $result, 'selected' => '']);
    }

    /**
     * Finds the Education model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Education the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Education::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
