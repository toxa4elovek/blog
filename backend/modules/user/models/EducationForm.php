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

}