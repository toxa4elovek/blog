<?php
/**
 * @var $this \yii\web\View
 * @var $posts array
 *
 * @var $post \backend\modules\post\models\Post
 */
?>
<div class="body-list">
    <ul class="block-list block-list-post abbreviated-list">
    <?php foreach ($posts as $post):?>
        <li class="block-list-item block-list-item-post abbreviated-list">
            <article class="block block-review">
                <a href="<?php echo \yii\helpers\Url::to(['/post/view' , 'slug' => $post->slug])?>" class="block-review-header">
                    <h3><?php echo $post->title?></h3>
                </a>

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
                            <img src="<?php echo  $post->img ?>" alt="post" width="180px" align="left">
                        <?php endif;?>
                        <p><?php echo $post->short_text?></p>
                    </div>

                    <div class="read_more"><a href="<?php echo \yii\helpers\Url::to(['/post/' . $post->slug])?>">Читать далее</a></div>

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
                            <span>585</span>
                        </div>
                        <div class="post_statistics">
                            <a href="#" class="fa fa-star"></a>
                            <span>53</span>
                        </div>
                        <div class="post_statistics">
                            <a href="<?php echo \yii\helpers\Url::to(['/likes/like'])?>" data-value="1"
                               data-id="<?php echo $post->id ?>"
                               class="fa fa-thumbs-up post-like">
                            </a>
                        </div>
                        <span id="likes-count<?php echo $post->id ?>">20</span>
                        <div class="post_statistics">
                            <a href="<?php echo \yii\helpers\Url::to(['/likes/dislike'])?>" data-value="0"
                               data-id="<?php echo $post->id ?>"
                               class="fa fa-thumbs-down post-dislike">

                            </a>

                        </div>
                    </div>
                </div>
            </article>
        </li>
    <?php endforeach;?>
    </ul>
</div>

<div class="more-post">
    <a class="more-post-button st-button">
        Мне нужно больше постов
    </a>
</div>
