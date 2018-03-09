<?php
/**
 * @var $this \yii\web\View
 * @var $categories \common\models\db\Category[]
 */

?>

<?php if (!empty($categories)) :?>
<ul class="crumbs inline-block">
    <?php
    \yii\helpers\ArrayHelper::multisort($categories, 'parent_id', SORT_ASC)?>

    <?php foreach ($categories as $category):?>

        <li class="inline-block-item inline-block-breadcrumb">
            <a class="breadcrumb-link" href="<?php echo \yii\helpers\Url::to(['/'.$category->slug])?>"><?php echo $category->name?></a>
        </li>

    <?php endforeach;?>

</ul>
<?php endif;?>

