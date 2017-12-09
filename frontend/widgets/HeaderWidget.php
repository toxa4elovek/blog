<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 20:26
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class HeaderWidget extends Widget
{
    public function run()
    {
       return $this->render('header');
    }
}