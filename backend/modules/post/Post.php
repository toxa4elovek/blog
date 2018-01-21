<?php

namespace backend\modules\post;

use yii\filters\AccessControl;

/**
 * post module definition class
 */
class Post extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\post\controllers';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
