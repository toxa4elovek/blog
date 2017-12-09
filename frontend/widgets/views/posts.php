<?php
/**
 * @var $this \yii\web\View
 * @var $posts array
 *
 * @var $post \backend\modules\post\models\Post
 */
?>
    <?php foreach ($posts as $post):?>
        <div class="post_block">
            <a href="#"><h3><?php echo $post->title?></h3></a>
            <div class="crumbs">
                <ol class="breadcrumb">
                    <?php
                    $categories = $post->categories;
                    \yii\helpers\ArrayHelper::multisort($categories, 'parent_id', SORT_ASC)?>
                    <?php foreach ($categories as $category):?>
                        <li><a href="<?php echo \yii\helpers\Url::to(['/'.$category->slug])?>"><?php echo $category->name?></a></li>
                    <?php endforeach;?>
                </ol>
            </div>
            <div class="post_content">
                <?php if (!empty($post->img)):?>
                    <img class="post_img pull-left" src="<?php echo  $post->img ?>" alt="post">
                <?php endif;?>
                <p><?php echo $post->short_text?></p>
            </div>
            <div class="read_more uppercase"><a href="<?php echo \yii\helpers\Url::to(['/post/' . $post->slug])?>">Читать далее</a></div>
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
                    <a href="#" class="fa fa-thumbs-up"></a>
                    <span>412</span>
                </div>
                <div class="post_statistics">
                    <a href="#" class="fa fa-thumbs-down"></a>
                    <span>20</span>
                </div>
            </div>
        </div>
    <?php endforeach;?>

