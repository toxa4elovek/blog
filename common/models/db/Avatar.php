<?php
/**
 *
 */

namespace common\models\db;

use common\classes\Debug;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Avatar extends \common\models\Avatar
{
    public $file;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['file'], 'safe']
        ]);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ]);
    }

    public function beforeSave($insert)
    {
        if (!$insert) {
            $path = \Yii::getAlias('@frontend/web');
            $img  = $this->oldAttributes['img'];

            if (file_exists($path . $img)) {
                unlink($path . $img);
            }
        }

        return parent::beforeSave($insert);
    }
}