<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\db\Post
 */

use yii\helpers\Url;
?>

<li class="block-list-item block-list-item-post abbreviated-list">
    <article class="block block-review">
        <h3><a href="<?= Url::to(['/post/view', 'slug' => $model->slug])?>" class="block-review-header"><?= $model->title?></a></h3>

        <?= \frontend\widgets\PostCategoryWidget::widget(['categories' => $model->categories])?>

        <div class="block-review-body block-review-body-post">
            <div class="body-post body-post-text">
                <img src="<?= $model->img?>" alt="Shekli" width="180px"
                     align="left">
                <p class="media-text text-justify"><?= $model->text?></p>
            </div>
            <div class="read_more"><a href="<?= Url::to(['/post/view', 'slug' => $model->slug])?>">Читать далее</a></div>

            <?= \frontend\widgets\PostInfoWidget::widget(['post' => $model])?>

        </div>
    </article>
</li>