<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 * @var $comments \common\models\PostComments[]
 */
?>

<div class="comments">
    <h3><i class="fa fa-comments-o fa-1x" aria-hidden="true"></i> Комментарии
        (<span>15</span>)</h3>

    <?php if (Yii::$app->user->isGuest):?>

        <div class="not-authorized">Вы должны авторизоваться, чтобы оставлять комментарии!</div>

    <?php else:?>

        <form action="<?php echo \yii\helpers\Url::to(['/comments/add'])?>" method="post" class="comment-form">
            <div class="form-group">
                <input type="hidden" value="<?php echo $post->id?>">
                <label for="comment"></label>
                <textarea class="form-control" rows="3" name="text" placeholder="Оставьте Ваш комментарий"></textarea>
                <div class="footer-comment">
                    <input type="submit" class="reply" value="Ответить">
                </div>
            </div>
        </form>

    <?php endif;?>

    <ul class="media-list">

        <?php foreach ($comments as $comment) : ?>

            <?php echo $this->render('@frontend/views/blocks/_comments-level', ['comment' => $comment])?>

        <?php endforeach;?>

    </ul>

</div>
