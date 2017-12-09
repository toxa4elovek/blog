<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 11.11.2017
 * Time: 14:17
 */

namespace common\classes;

/**
 * Class Debug
 * @package common\classes
 */
class Debug
{
    /**
     * @param $content
     */
    public static function prn($content)
    {
        echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
        print_r($content);
        echo '</pre>';
    }
}