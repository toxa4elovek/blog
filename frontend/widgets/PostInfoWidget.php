<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 24.12.2017
 * Time: 18:42
 */

namespace frontend\widgets;


use yii\base\Widget;

/**
 * Class PostInfoWidget
 * @package frontend\widgets
 */
class PostInfoWidget extends Widget
{
    public $post;

    public function run()
    {
        return $this->render('_post-info', ['post' => $this->post]);
    }
}