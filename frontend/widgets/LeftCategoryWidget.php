<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 20:42
 */

namespace frontend\widgets;


use common\models\Category;
use yii\bootstrap\Widget;

class LeftCategoryWidget extends Widget
{
    public $category;

    public function run()
    {
        return $this->render('_left_category', ['categories' => $this->category]);
    }

}