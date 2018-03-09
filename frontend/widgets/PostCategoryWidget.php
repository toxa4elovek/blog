<?php
/**
 *
 */

namespace frontend\widgets;


use common\models\db\Category;
use yii\jui\Widget;

/**
 * Class PostCategoryWidget
 * @package frontend\widgets
 * @property Category[] $categories
 */
class PostCategoryWidget extends Widget
{
    public $categories;

    public function run()
    {
        return $this->render('category_widget', ['categories' => $this->categories]);
    }

}