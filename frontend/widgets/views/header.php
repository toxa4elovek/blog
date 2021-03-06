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
            <?php echo (Yii::$app->user->can('admin'))
                ? \yii\helpers\Html::a('Админка', '/secure', ['class' => 'logo st-button'])
                : ''
            ?>
            <a href="<?php echo \yii\helpers\Url::to('/signup')?>" class="logo st-button">Регистрация</a>
            <a href="<?php echo \yii\helpers\Url::to('/profile')?>" class="logo st-button">Личный кабинет</a>
            <?php if(!Yii::$app->user->isGuest) :?>
                <a data-method="post" href="<?php echo \yii\helpers\Url::to('/user/security/logout')?>" class="logo st-button">Выйти</a>
            <?php endif;?>
        </div>
    </header>
</div>
