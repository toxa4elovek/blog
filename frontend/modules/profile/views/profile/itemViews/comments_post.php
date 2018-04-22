<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\db\Post
 */

use yii\helpers\Url;
use yii\widgets\ListView;
?>
<li class="block-list-item block-list-item-post abbreviated-list">
    <article class="block block-review">
        <h3><a href="<?= Url::to(['/post/view', 'slug' => $model->slug])?>" class="block-review-header"><?= $model->title?></a>
            <div class="read_more"><a href="<?= Url::to(['/post/view', 'slug' => $model->slug])?>">Полная статья</a></div>
        </h3>
        <div class="comments">
            <ul class="media-list">
                <?= ListView::widget([
                    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getComments()->where(['user_id' => Yii::$app->user->id])]),
                    'itemView' => '@frontend/modules/profile/views/profile/itemViews/comments',
                    'layout' => '{items}'
                ])?>
            </ul>
        </div>
    </article>
</li>