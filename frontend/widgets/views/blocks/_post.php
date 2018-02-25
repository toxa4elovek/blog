<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\db\Post
 */
?>

<li class="block-list-item block-list-item-post abbreviated-list">
    <article class="block block-review">
        <a href="<?php echo \yii\helpers\Url::to(['/post/view' , 'slug' => $model->slug])?>" class="block-review-header">
            <h3><?php echo $model->title?></h3>
        </a>

        <ul class="crumbs inline-block">
            <?php
            $categories = $model->categories;
            \yii\helpers\ArrayHelper::multisort($categories, 'parent_id', SORT_ASC)?>

            <?php foreach ($categories as $category):?>

                <li class="inline-block-item inline-block-breadcrumb">
                    <a class="breadcrumb-link" href="<?php echo \yii\helpers\Url::to(['/'.$category->slug])?>"><?php echo $category->name?></a>
                </li>

            <?php endforeach;?>

        </ul>

        <div class="block-review-body block-review-body-post">
            <div class="body-post body-post-text">
                <?php if (!empty($model->img)):?>
                    <img src="<?php echo  $model->img ?>" alt="post" width="180px" align="left">
                <?php endif;?>
                <p><?php echo $model->short_text?></p>
            </div>

            <div class="read_more"><a href="<?php echo \yii\helpers\Url::to(['/post/' . $model->slug])?>">Читать далее</a></div>

            <?php echo \frontend\widgets\PostInfoWidget::widget(['post' => $model])?>

        </div>
    </article>
</li>
