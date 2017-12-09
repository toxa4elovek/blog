<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 22:26
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class HeaderSlideWidget extends Widget
{
    public $items;

    public function run()
    {
        return $this->render('_header_slider', ['items' => $this->items]);
    }
}