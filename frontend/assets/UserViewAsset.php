<?php
/**
 *
 */

namespace frontend\assets;


class UserViewAsset extends AppAsset
{
    public $css = [
        'css/style-profile.css',
        'css/style-preview-profile.css',
    ];

    public $js = [
//        'js/myprofile.js'
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}