<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $slug
 * @property string $status
 * @property string $type
 *
 * @property PostCategory[] $postCategories
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name', 'slug', 'status', 'type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'slug' => 'Slug',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_category', ['category_id' => 'id']);
    }
}
