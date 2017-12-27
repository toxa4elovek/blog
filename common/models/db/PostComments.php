<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 25.12.2017
 * Time: 20:02
 */

namespace common\models\db;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class PostComments extends \common\models\PostComments
{
    public $child;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function rules()
    {
        return array_merge(parent::rules(),[
            [['created_at', 'updated_at'], 'safe'],
        ]);
    }

    public function getChild()
    {
        return $this->child;
    }

    public function setChild($value)
    {
        $this->child =  $value;
    }
}