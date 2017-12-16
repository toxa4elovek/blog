<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 09.12.2017
 * Time: 16:35
 */

namespace frontend\widgets;


use yii\base\Widget;

class PostWidget extends Widget
{
    public $post;

    public function run()
    {
        return $this->render('post', ['post' => $this->post]);
    }

}