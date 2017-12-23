<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 20:28
 */
?>

<div class="row row-wrapper-header">
    <header class="header">
        <div class="col-xs-8 header-main-left">
            <a href="<?php echo \yii\helpers\Url::to('/')?>" class="logo st-button">Лого</a>
            <form action="#" method="post" class="search-form" id="search-form">
                <input type="text" name="search" id="search-form-input">
            </form>
        </div>
        <div class="header-main-right">
            <a href="<?php echo \yii\helpers\Url::to('/signup')?>" class="logo st-button">Регистрация</a>
            <a href="<?php echo \yii\helpers\Url::to('/login')?>" class="logo st-button">Личный кабинет</a>
        </div>
    </header>
</div>
