<?php

namespace frontend\modules\userview;

/**
 * userview module definition class
 */
class UserView extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\userview\controllers';
    public $defaultRoute = 'userview';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
