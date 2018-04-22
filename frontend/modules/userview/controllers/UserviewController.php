<?php

namespace frontend\modules\userview\controllers;

use yii\web\Controller;

/**
 * Default controller for the `userview` module
 */
class UserviewController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
