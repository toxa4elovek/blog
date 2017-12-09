<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 12.11.2017
 * Time: 18:37
 */

namespace backend\modules\post\models;

use common\behaviors\SlugBehavior;
use common\behaviors\UploadBehavior;
use common\models\Post as BasePost;
use common\models\PostCategory;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Post extends BasePost
{
    private $_categories = null;
    public $fileImg;

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => SlugBehavior::className(),
                'in_attribute' => 'title',
                'out_attribute' => 'slug'
            ],
            [
                'class' => UploadBehavior::className(),
                'attributeName' => 'img',
                'attributeFile' => 'fileImg'
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ]);
    }

    public function rules()
    {
        $rules = parent::rules();

        return array_merge([
            ['slug', 'unique'],
            [['fileImg'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ], $rules);
    }

    public function setCategories($value)
    {
        $this->_categories = $value;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {
            PostCategory::deleteAll(['post_id' => $this->attributes['id']]);
        }
        if ($this->_categories) {
            foreach ($this->_categories as $category_id) {
                $model = New PostCategory();
                $model->attributes = [
                    'post_id' => $this->attributes['id'],
                    'category_id' => $category_id
                ];
                $model->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }
}