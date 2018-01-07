<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 07.01.2018
 * Time: 18:45
 */

namespace common\classes;


class TimeScript
{
    public $start;

    public function begin()
    {
        $this->start = microtime(true);
    }

    public function end()
    {
        return (microtime(true) - $this->start);
    }
}