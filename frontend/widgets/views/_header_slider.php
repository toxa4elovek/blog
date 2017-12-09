<?php
/**
 * @var $this \yii\web\View
 * @var $items array
 *
 */

use evgeniyrru\yii2slick\Slick;
use yii\helpers\Html;
?>

<?= Slick::widget([

    // HTML tag for container. Div is default.
    'itemContainer' => 'div',

    // HTML attributes for widget container
    'containerOptions' => ['class' => 'slider'],

    // Position for inclusion js-code
    // see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
    'jsPosition' => yii\web\View::POS_READY,

    // It possible to use Slick.js events
    // see more: http://kenwheeler.github.io/slick/#events
    'events' => [
        /*'edge' => 'function(event, slick, direction) {
                           console.log(direction);
                           // left
                      });'*/
    ],

    // Items for carousel. Empty array not allowed, exception will be throw, if empty
    'items' => $items,

    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'slick_block'],

    // settings for js plugin
    // @see http://kenwheeler.github.io/slick/#settings
    'clientOptions' => [
        'autoplay' => true,
        //'dots'     => true,
        'infinite' => true,
        'slidesToShow' => 3,
        'autoplaySpeed' => 3000,
        'slidesToScroll' => 1
        // note, that for params passing function you should use JsExpression object
        // but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
        //'onAfterChange' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],
]); ?>
