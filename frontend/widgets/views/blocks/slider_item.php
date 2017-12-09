<?php
/**
 * @var $post \common\models\Post
 */
?>

<a href="<?php echo \yii\helpers\Url::to(['/posts/' . $post->slug])?>">
    <img src="<?php echo $post->img ?>">
    <div class="slider_text">
        <h3><?php echo $post->title ?></h3>
        <p><?php echo $post->short_text ?></p>
    </div>
</a>