<?php

namespace frontend\modules\profile\controllers;

use common\models\db\User;
use yii\web\Controller;

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

        return $this->render('index', ['user' => $user]);
    }
}
