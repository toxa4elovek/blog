<?php

namespace frontend\modules\profile;

use yii\filters\AccessControl;

/**
 * profile module definition class
 */
class Profile extends \yii\base\Module
{
    public $defaultRoute = 'profile';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\profile\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
