<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 31.12.2017
 * Time: 19:08
 */

namespace backend\assets;


use yii\web\AssetBundle;

class TinyMceCodeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/prism.js',
    ];

    public $css = [
        'css/prism.css'
    ];

}