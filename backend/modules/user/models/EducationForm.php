<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 08.01.2018
 * Time: 16:43
 */

namespace backend\modules\user\models;


use yii\base\Model;

class EducationForm extends Model
{
    public $country_id;
    public $city_id;
    public $user_id;
    public $place_id;
    public $begin_at;
    public $ending_at;


    public function rules()
    {
        return [
            [['country_id', 'city_id', 'user_id', 'place_id'], 'integer'],
            [['begin_at', 'ending_at'], 'safe'],
            [['country_id', 'city_id', 'user_id', 'place_id'], 'required']
        ];
    }

    public function createModel($className)
    {
        return new $className($this->attributes);
    }
}