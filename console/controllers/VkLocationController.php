<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 02.01.2018
 * Time: 11:50
 */

namespace console\controllers;


use common\models\db\City;
use common\models\db\Country;
use common\models\db\Region;
use console\models\VkApi;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;

class VkLocationController extends Controller
{

    public function actionIndex()
    {
        $countries = ['ru', 'ua', 'by', 'kz'];
        $model = $this->_getApi();
        $countryData = [];

        foreach ($countries as $country){
            $result = $model->getCountries($country);
            $countryData[] = [
                'id' => $result['items'][0]['id'],
                'name' => $result['items'][0]['title'],
                'code' => $country
            ];
        }

        $this->_dataBaseExecute(['id', 'name', 'code'], $countryData, Country::tableName());
        $country_ids = ArrayHelper::getColumn($countryData, 'id');
        //Сохранение регионов стран
        $this->_saveRegions($country_ids);
        $this->stdout('Save ' . count($countryData) . ' countries' . PHP_EOL, Console::FG_BLUE);
    }

    private function _saveRegions(array $country_ids)
    {
        $api = $this->_getApi();

        foreach ($country_ids as $country_id){
            $regions = $api->getRegions($country_id);
            $regionData = [];
            //Сохранение главных городов
            $this->_saveCitiesMain($country_id);
            foreach ($regions['items'] as $region){
                $regionData[] = [
                    'id' => $region['id'],
                    'name' => $region['title'],
                    'country_id' => $country_id
                ];
            }

            $regionData = array_merge($regionData, [
                [
                    'id' => 1,
                    'name' => 'Москва город',
                    'country_id' => 1
                ],
                [
                    'id' => 2,
                    'name' => 'Санкт-Петербург город',
                    'country_id' => 1
                ]
            ]);

            $this->_dataBaseExecute(['id', 'name', 'country_id'], $regionData, Region::tableName());
            $this->_saveCities($regionData);
            $this->stdout('Save ' . count($regionData) . ' regions' . PHP_EOL, Console::FG_BLUE);
        }
    }

    private function _saveCities(array $regions)
    {
        $api = $this->_getApi();
        $cityData = [];
        $result = 0;
        foreach ($regions as $region) {
            $cities = $api->getCities($region['country_id'], $region['id']);

            foreach ($cities['items'] as $city){
                $cityData[] = [
                    'id' => $city['id'],
                    'name' => $city['title'],
                    'region_id' => $region['id'],
                    'country_id' => $region['country_id']
                ];
            }

            $this->_dataBaseExecute(['id', 'name', 'region_id', 'country_id'], $cityData, City::tableName());
            $this->stdout('Save ' . count($cityData) . ' cities' . PHP_EOL, Console::FG_BLUE);
            $result += count($cityData);
            $cityData = [];
        };
        $this->stdout('Save all' . $result . ' cities' . PHP_EOL, Console::FG_BLUE);
    }

    private function _saveCitiesMain($country_id)
    {
        $api = $this->_getApi();
        $cityData = [];

        $cityMain = $api->getCitiesMain($country_id);

        foreach ($cityMain['items'] as $city){
            $cityData[] = [
                'id' => $city['id'],
                'name' => $city['title'],
                'country_id' => $country_id,
                'is_main' => 1
            ];
        }

        $this->_dataBaseExecute(['id', 'name', 'country_id', 'is_main'], $cityData, City::tableName());
        $this->stdout('Save ' . count($cityData) . ' main cities' . PHP_EOL, Console::FG_BLUE);
    }

    protected function _dataBaseExecute(array $columns, array $values, $tableName)
    {
        if(empty($values)){
            return false;
        }

        $db = \Yii::$app->db;
        $sql = $db->queryBuilder->batchInsert($tableName, $columns, $values);
        $updateParams = '';

        foreach ($columns as $column){
            $updateParams .= "`$column`=VALUES(`$column`)";

            if($column !== $columns[count($columns) - 1]){
                $updateParams .= ', ';
            }
        }

        $db->createCommand($sql . 'ON DUPLICATE KEY UPDATE '. $updateParams)->execute();
    }

    /**
     * @return VkApi
     */
    protected function _getApi()
    {
        return new VkApi();
    }

}