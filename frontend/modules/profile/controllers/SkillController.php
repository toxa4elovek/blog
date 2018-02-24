<?php
/**
 *
 */

namespace frontend\modules\profile\controllers;


use common\classes\Debug;
use common\models\db\Skill;
use common\models\db\User;
use common\models\db\UserSkill;
use yii\db\Exception;
use yii\db\Query;
use yii\web\Controller;
use yii\web\Response;

class SkillController extends Controller
{
    public function actionFind($q = null, $id = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, name AS text')
                ->from('skill')
                ->where(['like', 'name', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Skill::findOne($id)->name];
        }

        return $out;
    }

    public function actionSave()
    {
        $skills = \Yii::$app->request->post('Skills');
        $user   = User::findOne(\Yii::$app->user->id);
        $transaction = \Yii::$app->db->beginTransaction();

        try {
            UserSkill::deleteAll(['user_id' => $user->id]);

            if (!empty($skills)) {
                foreach ($skills as $skill) {
                    $skillModel = Skill::find()->where(['name' => $skill])->orWhere(['id' => $skill])->one();

                    if (empty($skillModel)) {
                        $skillModel = new Skill(['name' => $skill, 'status' => 1]);
                        $skillModel->save();
                    }

                    $skillModel->link('users', $user);
                }

                \Yii::$app->session->setFlash('success', 'Данные успешно сохранены');
                $transaction->commit();
            }

        } catch (Exception $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
            $transaction->rollBack();
        }

        return $this->renderPartial('../profile/elements/__skills', ['user' => $user]);
    }
}