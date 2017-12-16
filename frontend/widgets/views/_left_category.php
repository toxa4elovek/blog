<?php
/**
 * @var $this \yii\web\View
 * @var $categories array
 */
?>

<div class="catalog left-block catalog_full">
    <div class="catalog-block uppercase">
        <h6>каталог тем</h6>
        <div class="list-group clear">

            <?php foreach ($categories as $category) :?>
            <div class="flex">
                <a class="list-group-item left-text" href="<?php echo \yii\helpers\Url::to('/category/'.$category->slug)?>">
                    <?php echo $category->name?>
                    <span class="badge">15</span></a>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
