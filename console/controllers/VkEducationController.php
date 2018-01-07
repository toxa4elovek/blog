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
use common\models\db\School;
use common\models\db\University;
use yii\helpers\Console;

class VkEducationController extends VkLocationController
{
    public function actionIndex()
    {
        $cities = City::find()->asArray()->all();
        $schoolsData = [];

        $timeScript = New TimeScript();

        $timeScript->begin();
        foreach ($cities as $city){
            $schoolsData = array_merge($schoolsData, $this->_getSchools($city['id']));
            $this->stdout('count record = '. count($schoolsData) . PHP_EOL);
        }
        $this->stdout('Time = '. $timeScript->end() . PHP_EOL);

        $this->_dataBaseExecute(['id', 'name', 'city_id'], $schoolsData, School::tableName());
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
                    'city_id' => $city_id
                ];
            }
        }

        return $schoolsData;
    }

    public function actionGetUniversities()
    {
        $cities = City::find()->asArray()->all();
        $universitiesData = [];

        $timeScript = New TimeScript();

        $timeScript->begin();
        foreach ($cities as $city){
            $universitiesData = array_merge($universitiesData, $this->_getUniversities($city['id'], $city['country_id']));
            $this->stdout('count record = '. count($universitiesData) . PHP_EOL);
        }
        $this->stdout('Time = '. $timeScript->end() . PHP_EOL);

        $this->_dataBaseExecute(['id', 'name', 'city_id'], $universitiesData, University::tableName());
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
                    'city_id' => $city_id
                ];
            }
        }

        return $universitiesData;
    }
}