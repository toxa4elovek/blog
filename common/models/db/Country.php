<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 06.01.2018
 * Time: 11:24
 */

namespace common\models\db;


use yii\helpers\ArrayHelper;

class Country extends \common\models\Country
{
    public static function getCountryList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}