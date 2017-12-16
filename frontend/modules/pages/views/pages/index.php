<?php
/* @var $this yii\web\View
 * @var $sliderItems array
 * @var $posts array
 */
?>
<?php $this->params['items'] = $sliderItems ?>
<div class="right-block">
    <div class="namе_group">
        <h2 class="namе-group">Администрирование</h2>
    </div>

        <?php echo \frontend\widgets\PostsWidget::widget(['posts' => $posts]) ?>

    <div class="namе_group">
        <h2 class="namе-group">Вопросы</h2>
    </div>

        <?php echo \frontend\widgets\QuestionsWidget::widget() ?>
</div>

