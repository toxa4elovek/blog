<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 20:29
 */

namespace frontend\widgets;


use yii\bootstrap\Widget;

class FooterWidget extends Widget
{
    public function run()
    {
        return $this->render('footer');
    }
}