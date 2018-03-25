<?php
/**
 * @var $this \yii\web\View
 * @var $post \frontend\models\Post
 * @var $comments \common\models\db\PostComments[]
 */
?>


    <div class="col-sm-8">
        <div class="body-header">
            <h1 class="namе-group"><?php echo $post->categories[0]->name ?></h1>
        </div>
        <div class="body-list">
            <article class="block-list-article block-list-item block block-review">
                <h1 class="block-review-header"><?php echo $post->title ?></h1>
                <ul class="crumbs inline-block">
                    <?php
                    $categories = $post->categories;
                    \yii\helpers\ArrayHelper::multisort($categories, 'parent_id', SORT_ASC)?>
                    <?php foreach ($categories as $category):?>
                        <li class="inline-block-item inline-block-breadcrumb">
                            <a class="breadcrumb-link" href="<?php echo \yii\helpers\Url::to(['/'.$category->slug])?>"><?php echo $category->name?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="block-review-body block-review-body-post">
                    <div class="body-post body-post-text">
                        <?php if (!empty($post->img)):?>
                            <img src="<?php echo  $post->img ?>" alt="post">
                        <?php endif;?>
                        <p><?php echo $post->text?></p>
                    </div>

                    <?php echo \frontend\widgets\PostInfoWidget::widget(['post' => $post])?>
                </div>

            <!--БЛОК КОММЕНТАРИЕВ-->

                <?php echo $this->render('@frontend/views/blocks/_comments',['comments' => $post->getCommentsTree(), 'post' => $post])?>

            </article>
        </div>
    </div>
    <input type="hidden" name="post_id" value="<?php echo $post->id?>">