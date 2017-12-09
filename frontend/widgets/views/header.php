<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 16.11.2017
 * Time: 20:28
 */
?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 center uppercase f32 top">
                <div class="my-block left">
                    <a href="<?php echo \yii\helpers\Url::to('/')?>" class="st-button">Лого</a>
                </div>
            </div>
            <div class="col-xs-10 center uppercase f11 top">
                <div class="my-block right">
                    <a href="<?php echo \yii\helpers\Url::to('/signup')?>" class="st-button">Регистрация</a>
                </div>
                <div class="my-block right">
                    <a href="<?php echo \yii\helpers\Url::to('/login')?>" class="st-button">Личный кабинет</a>
                </div>
                <div class="search">
                    <input type="text" name="search">
                </div>
            </div>
        </div>
    </div>
</header>
