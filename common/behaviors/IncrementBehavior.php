<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 10:38
 */
namespace common\behaviors;
use common\classes\Debug;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class IncrementBehavior extends Behavior
{
    public $attribute;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'setIncrement'
        ];
    }

    public function setIncrement()
    {
        $this->owner->updateCounters([$this->attribute => 1]);
    }
}