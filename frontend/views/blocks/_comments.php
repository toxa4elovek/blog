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

        <form action="#" method="post">
            <div class="form-group">
                <input type="hidden" value="<?php echo $post->id?>">
                <label for="comment"></label>
                <textarea class="form-control" id="comment" rows="3" placeholder="Оставьте Ваш комментарий"></textarea>
                <div class="footer-comment">
                    <a class="btn btn-default" href="javascript: void 0">Опубликовать</a>
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
