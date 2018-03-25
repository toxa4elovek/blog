<?php
/**
 *
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class FullPostAsset extends AssetBundle
{

    public $css = [
        'css/style-full-post.css',
    ];

    public $js = [

    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}