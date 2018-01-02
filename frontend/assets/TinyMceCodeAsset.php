<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 31.12.2017
 * Time: 20:31
 */

namespace frontend\assets;


class TinyMceCodeAsset extends \backend\assets\TinyMceCodeAsset
{
    public $sourcePath = '@backend/web';

    public $css = [
        'prism.css'
    ];

    public $js = [
        'prism.js'
    ];

}