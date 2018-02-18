<?php
/**
 *
 */

namespace common\models\db;


class Education extends \common\models\Education
{
    const TYPE_MIDDLE = 1;
    const TYPE_HIGHER = 2;

    public $country_id;
    public $city_id;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['city_id', 'country_id'], 'integer'],
        ]);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_MIDDLE => 'Среднее',
            self::TYPE_HIGHER => 'Высшее'
        ];
    }

    public function afterFind()
    {
        parent::afterFind();

        $this->city_id = $this->place->city_id;
        $this->country_id = $this->place->city->country_id;
    }

}