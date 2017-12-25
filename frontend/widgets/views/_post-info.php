<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 */
?>

<div class="statistics clear">
    <div class="post_statistics">
        <a href="#" class="fa fa-calendar"></a>
        <time><?php echo Yii::$app->formatter->asDate($post->updated_at)?></time>
    </div>
    <div class="post_statistics">
        <a href="#" class="fa fa-user"></a>
        <span><?php echo $post->user->username?></span>
    </div>
    <div class="post_statistics">
        <a href="#" class="fa fa-eye"></a>
        <span><?php echo $post->views ?></span>
    </div>
    <div class="post_statistics">
        <a href="<?php echo \yii\helpers\Url::to(['/post-info/favourites', 'id' => $post->id])?>"
           data-id="<?php echo $post->id ?>"
           class="fa fa-star user-favourite <?php echo (!empty($post->userFavourite) ? 'info-active' : '')?>">
            <span><?php echo $post->countFavourites ?></span>
        </a>
    </div>
    <div class="post_statistics">
        <a href="<?php echo \yii\helpers\Url::to(['/post-info/like'])?>" id="like<?php echo $post->id?>" data-value="1"
           data-id="<?php echo $post->id ?>"
           data-like="1"
           class="fa fa-thumbs-up post-like <?php echo ($post->userLike->like === 1) ? 'like-active' : ''?>">
        </a>
    </div>
    <span id="likes-count<?php echo $post->id ?>"><?php echo $post->getDifferenceCountLikes()?></span>
    <div class="post_statistics">
        <a href="<?php echo \yii\helpers\Url::to(['/post-info/like'])?>" id="dislike<?php echo $post->id?>"
           data-value="0"
           data-id="<?php echo $post->id ?>"
           data-like="0"
           class="fa fa-thumbs-down post-dislike <?php echo ($post->userLike->like === 0) ? 'like-active' : ''?>">
        </a>
    </div>
</div>
