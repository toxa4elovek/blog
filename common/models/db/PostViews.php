<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 23.12.2017
 * Time: 10:55
 */

namespace common\models\db;

use common\classes\Debug;

class PostViews extends \common\models\PostViews
{
    public function beforeValidate()
    {
        $this->ip_address = ip2long(\Yii::$app->request->userIP);
        $this->user_id = \Yii::$app->user->id;
        return parent::beforeValidate();
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->validate();
        $db = \Yii::$app->db;

        $sql = $db->createCommand()->insert(PostViews::tableName(), $this->attributes)->rawSql;
        $db->createCommand($sql . 'ON DUPLICATE KEY UPDATE `count` = `count` + 1')->execute();

    }

    public function afterFind()
    {
        $this->ip_address = long2ip($this->ip_address);
    }
}