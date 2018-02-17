<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 06.01.2018
 * Time: 15:18
 */

namespace console\controllers;


use common\classes\TimeScript;
use common\models\db\City;
use common\models\db\EducationPlace;
use common\models\db\School;
use common\models\db\University;
use yii\helpers\Console;

class VkEducationController extends VkLocationController
{
    public function actionIndex()
    {
        $cities = City::find()->where(['is_main' => 1])->asArray()/*->offset(192903)*/->all();
        $schoolsData = [];

        $timeScript = New TimeScript();
        $countAll = count($cities);
        $count = 0;
        $timeScript->begin();
        foreach ($cities as $city){
            $count++;
            $result = $this->_getSchools($city['id']);
            $this->_dataBaseExecute(['id', 'name', 'city_id', 'type'], $result, EducationPlace::tableName());
            $diff = $countAll - $count;
            $this->stdout('count back = '. $diff . PHP_EOL);
        }
        $this->stdout('Time = '. $timeScript->end() . PHP_EOL);


        $this->stdout('Save ' . count($schoolsData) . ' schools in ' .count($cities) . ' cities' . PHP_EOL, Console::FG_BLUE);
    }

    private function _getSchools($city_id)
    {
        $api = $this->_getApi();
        $schools = $api->getSchools($city_id);
        $schoolsData = [];

        if(count($schools['items']) > 0) {
            foreach ($schools['items'] as $school){
                $schoolsData[] = [
                    'id' => $school['id'],
                    'name' => $school['title'],
                    'city_id' => $city_id,
                    'type' => 1
                ];
            }
        }

        return $schoolsData;
    }

    public function actionGetUniversities()
    {
        $cities = City::find()->where(['is_main' => 1])->asArray()->all();
        $universitiesData = [];

        $timeScript = New TimeScript();

        $timeScript->begin();
        foreach ($cities as $city){
            $universitiesData = array_merge($universitiesData, $this->_getUniversities($city['id'], $city['country_id']));
            $this->stdout('count record = '. count($universitiesData) . PHP_EOL);
        }
        $this->stdout('Time = '. $timeScript->end() . PHP_EOL);

        $this->_dataBaseExecute(['id', 'name', 'city_id', 'type'], $universitiesData, EducationPlace::tableName());
        $this->stdout('Save ' . count($universitiesData) . ' universities in ' .count($cities) . ' cities' . PHP_EOL, Console::FG_BLUE);
    }

    private function _getUniversities($city_id, $country_id)
    {
        $api = $this->_getApi();
        $universities = $api->getUniversities($country_id, $city_id);
        $universitiesData = [];

        if(count($universities['items']) > 0) {
            foreach ($universities['items'] as $university){
                $universitiesData[] = [
                    'id' => $university['id'],
                    'name' => $university['title'],
                    'city_id' => $city_id,
                    'type' => 2
                ];
            }
        }

        return $universitiesData;
    }
}