<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.12.2017
 * Time: 10:08
 */

namespace common\models\db;


class Category extends \common\models\Category
{
    /**
     * @var array
     */
    const CATEGORY_TYPES = [self::PARENT_CATEGORY => 'Нет', self::NEWS_CATEGORY => 'Новости', self::POSTS_CATEGORY => 'Посты'];
    const ACTIVE_CATEGORY = 1;
    const DISABLE_CATEGORY = 0;
    const PARENT_CATEGORY = 0;
    const NEWS_CATEGORY = 1;
    const POSTS_CATEGORY = 2;
}