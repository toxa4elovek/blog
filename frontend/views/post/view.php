<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 */
$this->registerMetaTag([
    'name' => 'title',
    'content' => $post->title
]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => $post->short_text
]);

$this->title = $post->title;
\frontend\assets\TinyMceCodeAsset::register($this);
?>
<div class="column">
<?php
    echo \frontend\widgets\LeftCategoryWidget::widget(['category' => \common\models\db\Category::find()->all()]);
    echo \frontend\widgets\PostWidget::widget(['post' => $post]);

    \frontend\assets\FullPostAsset::register($this)
?>
</div>
