<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\db\PostComments
 */
?>

<li class="media">
    <div class="media-body">
        <div class="media-heading">
            <div class="metadata">
                <div class="post_statistics">
                    <a href="#" class="fa fa-calendar"></a>
                    <time><?= Yii::$app->formatter->asDatetime($model->created_at)?></time>

                    <a href="<?php echo \yii\helpers\Url::to(['/likes/like-comment'])?>" id="like<?php echo $model->id?>"
                       data-value="1"
                       data-id="<?php echo $model->id ?>"
                       data-like="1"
                       class="fa fa-thumbs-up post-like <?php echo ($model->userLike->like === 1) ? 'like-active' : ''?>">
                    </a>

                    <span id="likes-count<?php echo $model->id ?>"><?php echo $model->getDifferenceCountLikes()?></span>

                    <a href="<?php echo \yii\helpers\Url::to(['/likes/like-comment'])?>" id="dislike<?php echo $model->id?>"
                       data-value="0"
                       data-id="<?php echo $model->id ?>"
                       data-like="0"
                       class="fa fa-thumbs-down post-dislike <?php echo ($model->userLike->like === 0) ? 'like-active' : ''?>">
                    </a>
                </div>
            </div>
        </div>
        <div class="media-text text-justify"><?= $model->text?>
        </div>
        <div class="edit">
            <a class="btn btn-primary" href="#">Редактировать</a>
        </div>
    </div>
</li>
<hr>
