<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 12.11.2017
 * Time: 15:01
 */

namespace backend\modules\references\models;

use common\behaviors\SlugBehavior;
use common\models\db\Category as BaseCategory;

/**
 * Class Category
 * @package backend\modules\references\models
 */
class Category extends BaseCategory
{
    public function rules()
    {
        $rules = parent::rules();
        return array_merge([
            [['name', 'status', 'type'], 'required'],
            ['slug', 'unique']
        ], $rules);
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => SlugBehavior::className(),
                'in_attribute' => 'name',
                'out_attribute' => 'slug'
            ],
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getParentCategories()
    {
        return self::find()->where(['parent_id' => 0])->all();
    }

    public static function getParentCategoryName($id)
    {
        if($id === 0) {
            return 'Нет';
        }

        $parent = self::findOne($id);

        if(!empty($parent)) {
            return $parent->name;
        }else  return null;
    }
}