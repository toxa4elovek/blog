<?php
/**
 * @var $this \yii\web\View
 * @var $items array
 */

use evgeniyrru\yii2slick\Slick;

?>

    <div class="col-xs-12 col-slider">
    <?= Slick::widget([
        'itemContainer' => 'div',
        'containerOptions' => ['class' => 'slider-float'],
        'jsPosition' => yii\web\View::POS_READY,
        'events' => [
            /*'edge' => 'function(event, slick, direction) {
                               console.log(direction);
                               // left
                          });'*/
        ],
        'items' => $items,
        'itemOptions' => ['class' => 'slick_block'],
        'clientOptions' => [
            'autoplay' => true,
            'infinite' => true,
            'slidesToShow' => 5,
            'autoplaySpeed' => 2000,
            'slidesToScroll' => 1
        ],
    ]); ?>
    </div>
