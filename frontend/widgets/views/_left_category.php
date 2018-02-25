<?php
/**
 * @var $this \yii\web\View
 * @var $categories array
 */
?>

<div class="col-sm-4">
    <div class="category-block">
        <div class="category-block-header">
            <span class="category-block-header-title">Каталог тем</span>
        </div>
        <div class="category-block-content">
            <ul class="tab">
            <?php foreach ($categories as $category) :?>
            <li class="tab-menu">
                <a class="tab-link" href="<?php echo \yii\helpers\Url::to('/category/'.$category->slug)?>">
                    <span class="tab-logo"><?php echo $category->name?></span>
                    <span class="tab-count">508</span>
                </a>
            </li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
