<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 06.01.2018
 * Time: 11:25
 */

namespace common\models\db;


use yii\helpers\ArrayHelper;

class City extends \common\models\City
{


    public static function getMainCityByCountryId($country_id)
    {
        return self::findAll(['is_main' => 1, 'country_id' => $country_id]);
    }

    public static function getMainCityArrayByCountryId($country_id)
    {
        return ArrayHelper::map(self::getMainCityByCountryId($country_id), 'id', 'name');
    }

    public function getUniversityArray()
    {
        return ArrayHelper::map(
            $this->getUniversities()->all(), 'id', 'name'
        );
    }
}