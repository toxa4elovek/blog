<?php
/**
 * @var $this \yii\web\View
 * @var $comment \common\models\db\PostComments
 */
?>
    <!-- Вложенный медиа-компонент (уровень 3) -->
<div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object img-thumbnail" src="img/avatar3.jpg" alt="">
            </a>
        </div>
        <div class="media-body">
            <div class="media-heading">
                <div class="author"><?php echo $comment->user->username?></div>
                <div class="metadata">
                    <div class="post_statistics">
                        <a href="#" class="fa fa-calendar"></a>
                        <time><?php echo Yii::$app->formatter->asDatetime($comment->created_at)?></time>
                    </div>
                    <div class="post_statistics">
                        <a href="#" class="fa fa-thumbs-up"></a>
                        <span>12</span>
                        <a href="#" class="fa fa-thumbs-down"></a>
                    </div>
                </div>
            </div>
            <div class="media-text text-justify">

                <?php if($comment->parent_id > 0):?>
                    <a href="<?php echo \yii\helpers\Url::to(['/user/profile'])?>"><?php echo $comment->parent->user->username?>, </a>
                <?php endif;?>
                <?php echo $comment->text?>

            </div>

            <?php if($comment->user->id !== Yii::$app->user->id && !Yii::$app->user->isGuest):?>

                <div class="footer-comment">
                    <a class="reply block-comments-show" href="#">Ответить</a>

                    <form action="<?php echo \yii\helpers\Url::to(['/comments/add'])?>" method="post" class="block-comments-hide">
                        <div class="form-group">
                            <label for="comment1"></label>
                            <input type="hidden" name="parent_id" value="<?php echo $comment->id?>">
                            <textarea class="form-control" name="text" rows="3"
                                      placeholder="Оставьте Ваш комментарий"><?php echo $comment->user->username?>, </textarea>
                            <div class="footer-comment">
                                <input type="submit" class="reply" value="Ответить">
                            </div>
                        </div>
                    </form>
                </div>

            <?php endif;?>



            <hr>

            <?php if(count($comment->child) > 0):?>

                <?php foreach ($comment->child as $comments):?>

                    <?php echo $this->render('@frontend/views/blocks/_comments-level', ['comment' => $comments])?>

                <?php endforeach;?>

            <?php endif;?>
            
        </div>
</div>
    <!-- Конец вложенного комментария (уровень 3) -->
