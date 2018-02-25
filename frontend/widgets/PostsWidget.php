<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 21:44
 */

namespace frontend\widgets;


use common\models\Post;
use yii\bootstrap\Widget;

class PostsWidget extends Widget
{
    public $posts;
    public $postDataProvider;

    public function run()
    {
        return $this->render('posts', ['posts' => $this->posts, 'postDataProvider' => $this->postDataProvider]);
    }
}