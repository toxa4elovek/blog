<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 06.01.2018
 * Time: 15:18
 */

namespace console\controllers;


use common\models\db\City;

class VkEducationController extends VkLocationController
{
    public function actionIndex()
    {
        $cities = City::find()->all();

        foreach ($cities as $city){
            var_dump($city->attributes); die();
        }
    }
}