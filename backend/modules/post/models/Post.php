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
use common\models\db\Post as BasePost;
use common\models\db\PostCategory;
use common\models\db\PostOptions;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Post extends BasePost
{
    private $_categories = null;
    private $_options;
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

    public function setOptions($value)
    {
        if($value instanceof PostOptions) {
            $this->_options = $value;
        }else $this->_options = new PostOptions();
    }

    public function saveOptions()
    {
        if($this->_options instanceof PostOptions) {
            $this->_options->post_id = $this->id;
            $this->_options->save();
        }
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

        if($this->_options !== null) {
            $this->saveOptions();
        }

        parent::afterSave($insert, $changedAttributes);
    }
}