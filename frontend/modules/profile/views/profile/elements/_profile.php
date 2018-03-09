<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 * @var $educations array
 */

use yii\bootstrap\Modal;

?>

<div id="content-tab1" class="tab-content-active">
    <div class="col-sm-8">
        <div class="rg-profile profile-prompt">
            <div class="prompt"></div>
        </div>
    </div>
    <div class="col-sm-8 col-pad">
        <div class="rg-profile profile-input clearfix">
            <div class="col-sm-5">
                <div class="main-block-menu">
                    <ul class="menu-main">
                        <li><a href="#main" class="main-link current">Основное</a></li>
                        <li><a href="#education" class="education-link">Образование</a></li>
                        <li><a href="#work" class="work-link">Место работы</a></li>
                        <li><a href="#skill" class="skill-link">Навыки</a></li>
                        <li><a href="#about" class="about-link">О себе</a></li>
                        <li><a href="#" class="profile-link">Статистика</a></li>
                        <li><!--<a href="#" class="change-password">Изменить пароль</a>-->
                            <?= $this->render('__modals')?>
                        </li>
                        <li><a href="#" class="profile-link">Изменить фото</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-7">
                <?= $this->render('__main', ['user' => $user])?>
                <?= $this->render('__education', ['user' => $user, 'educations' => $educations])?>
                <?= $this->render('__work', ['user' => $user])?>
                <?= $this->render('__skills', ['user' => $user])?>
                <?= $this->render('__about', ['user' => $user])?>
            </div>
        </div>
    </div>
</div>
