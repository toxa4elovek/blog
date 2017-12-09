<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 03.12.2017
 * Time: 16:24
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class FooterSlideWidget extends Widget
{
    public $items;

    public function run()
    {
        return $this->render('_footer_slider', ['items' => $this->items]);
    }
}