<?php
/* @var $this yii\web\View
 * @var $sliderItems array
 * @var $posts array
 * @var $postDataProvider \yii\data\ActiveDataProvider
 */

use common\models\db\Category;
?>

<?php $isEmptyPosts = empty($sliderItems) && empty($posts)?>

<?php if (!$isEmptyPosts) :?>

    <?php echo \frontend\widgets\HeaderSlideWidget::widget(['items' => $sliderItems])?>


    <div class="column">

        <?php echo \frontend\widgets\LeftCategoryWidget::widget(['category' => Category::findAll(['parent_id' => 0])])?>

        <div class="col-sm-8">
            <div class="body-header">
                <h2 class="namе-group">Администрирование</h2>
            </div>

                <?php echo \frontend\widgets\PostsWidget::widget(['postDataProvider' => $postDataProvider]) ?>

            <div class="body-header">
                <h2 class="namе-group">Вопросы</h2>
            </div>

                <?php echo \frontend\widgets\QuestionsWidget::widget() ?>
        </div>
    </div>

    <?php echo \frontend\widgets\FooterSlideWidget::widget(['items' => $sliderItems])?>

<?php else:?>
    <h3>Постов пока нет</h3>
<?php endif;?>

