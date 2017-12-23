<?php
/* @var $this yii\web\View
 * @var $sliderItems array
 * @var $posts array
 */
?>
<?php $this->params['items'] = $sliderItems ?>

<?php echo \frontend\widgets\HeaderSlideWidget::widget(['items' => $this->params['items']])?>

<?php echo \frontend\widgets\LeftCategoryWidget::widget()?>

<div class="col-9">
    <div class="body-header">
        <h2 class="namе-group">Администрирование</h2>
    </div>

        <?php echo \frontend\widgets\PostsWidget::widget(['posts' => $posts]) ?>

    <div class="body-header">
        <h2 class="namе-group">Вопросы</h2>
    </div>

        <?php echo \frontend\widgets\QuestionsWidget::widget() ?>
</div>

<?php echo \frontend\widgets\FooterSlideWidget::widget(['items' => $this->params['items']])?>

