<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 21.01.2018
 * Time: 12:38
 */

namespace frontend\assets;


class ProfileAsset extends AppAsset
{
    public $css = [
        'css/style-profile.css'
    ];

    public $js = [
        'js/myprofile.js'
    ];

    public $depends = [
        'frontend\assets\AppAsset'
    ];
}