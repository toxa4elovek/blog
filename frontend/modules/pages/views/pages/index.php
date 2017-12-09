<?php
/* @var $this yii\web\View
 * @var $sliderItems array
 * @var $posts array
 */
?>
<div class="container-fluid">
    <div class="row">
        <?php echo \frontend\widgets\HeaderSlideWidget::widget(['items' => $sliderItems])?>
    </div>
</div>

<div class="container-fluid main_catalog">
    <div class="row">
        <div class="col-sm-3">

            <?php echo \frontend\widgets\LeftCategoryWidget::widget()?>

        </div>
        <div class="col-sm-9">
            <div class="right-block">
                <div class="namе_group">
                    <h2 class="namе-group">Администрирование</h2>
                </div>

                <?php echo \frontend\widgets\PostsWidget::widget(['posts' => $posts])?>

                <div class="namе_group">
                    <h2 class="namе-group">Вопросы</h2>
                </div>

                <?php echo \frontend\widgets\QuestionsWidget::widget()?>

            </div>
        </div>

    </div>

</div>

    <a href="#" class="scrollup">Наверх</a>

<div class="container-fluid">
    <div class="row">
        <?php echo \frontend\widgets\FooterSlideWidget::widget(['items' => $sliderItems])?>
    </div>
</div>
