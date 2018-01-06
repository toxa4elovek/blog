<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 02.01.2018
 * Time: 11:54
 */

namespace console\models;

use yii\base\Model;

class VkApi extends Model
{
    const METHOD_GET_REGIONS = 'database.getRegions';
    const METHOD_GET_CHAIRS = 'database.getChairs';
    const METHOD_GET_CITIES = 'database.getCities';
    const METHOD_GET_COUNTRIES = 'database.getCountries';
    const METHOD_GET_SCHOOLS = 'database.getSchools';
    const METHOD_GET_UNIVERSITIES = 'database.getUniversities';

    public static $url = 'https://api.vk.com/method/';
    public static $version = '5.69';
    public $request;

    /**
     * @param $code
     * @return mixed|null
     */
    public function getCountries($code)
    {
        return $this->_getResponse($this->_getRequestUrl(self::METHOD_GET_COUNTRIES, [
            'code' => $code,
        ]));
    }

    /**
     * @param int $country_id
     * @return mixed
     */
    public function getRegions($country_id)
    {
        return $this->_getResponse($this->_getRequestUrl(self::METHOD_GET_REGIONS, [
            'country_id' => $country_id,
        ]));
    }

    /**
     * @param int $region_id
     * @param int $country_id
     * @param int $limit
     * @return mixed|null
     */
    public function getCities($country_id, $region_id = 1, $limit = 1000)
    {
        $result =  $this->_getResponse($this->_getRequestUrl(self::METHOD_GET_CITIES, [
            'country_id' => $country_id,
            'region_id' => $region_id,
            'count' => $limit
        ]));

        if($result['count'] > $limit){
            $page_count = $this->_getPageCount($result['count'], $limit);

            for ($i = 1; $i < $page_count; $i++){
                $page = $this->_getResponse($this->_getRequestUrl(self::METHOD_GET_CITIES, [
                    'country_id' => $country_id,
                    'region_id' => $region_id,
                    'count' => $limit,
                    'offset' => $limit * $i
                ]));

                $result['items'] = array_merge($result['items'], $page['items']);
            }
        }

        return $result;
    }

    public function getCitiesMain($country_id)
    {
        return $this->_getResponse($this->_getRequestUrl(self::METHOD_GET_CITIES, [
            'country_id' => $country_id,
            'need_all' => 0,
            'count' => 100
        ]));
    }

    /**
     * @param $method
     * @param array $params
     * @return string
     */
    private function _getRequestUrl($method, array $params)
    {
        return self::$url . $method . '?' . $this->_prepareParams($params);
    }

    /**
     * @param $count
     * @param $limit
     * @return integer
     */
    private function _getPageCount($count, $limit)
    {
        return ceil($count/$limit);
    }

    /**
     * @param $request
     * @return mixed|null
     */
    private function _getResponse($request)
    {
        $lang = 0; // russian
        $headerOptions = [
            'http' => [
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "Cookie: remixlang=$lang\r\n"
            ]
        ];
        $streamContext = stream_context_create($headerOptions);
        if(!empty($request)){
            return json_decode(file_get_contents($request, false, $streamContext), true)['response'];
        }return null;
    }

    /**
     * @param array $params
     * @return string
     */
    private function _prepareParams(array $params)
    {
        $result = '';

        if(!empty($params)){
            foreach ($params as $key => $param){
                $result .= '&' . $key . '=' . $param . '&v=' . self::$version;
            }
        }

        return $result;
    }

}