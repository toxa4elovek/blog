<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 */
\frontend\assets\TinyMceCodeAsset::register($this);
echo \frontend\widgets\LeftCategoryWidget::widget();
echo \frontend\widgets\PostWidget::widget(['post' => $post]);
?>