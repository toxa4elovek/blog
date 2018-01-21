<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 21.01.2018
 * Time: 13:10
 */

namespace common\models\db;

/**
 * @property City $city
 * Class Profile
 * @package common\models\db
 */
class Profile extends \common\models\Profile
{
    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;

    public function getGendersName()
    {
        return [
            self::GENDER_MAN => 'Мужской',
            self::GENDER_WOMAN => 'Женский'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}