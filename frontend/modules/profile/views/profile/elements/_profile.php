<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 * @var $educations array
 */

use yii\bootstrap\Modal;

?>


        <?php $this->beginContent('@frontend/modules/profile/views/profile/index.php')?>

        <div class="profile-input profile-block-input clearfix">
            <div class="col-sm-5">
                <div class="main-block-menu">
                    <ul class="menu-main">
                        <li><a href="#main" class="main-link current">Основное</a></li>
                        <li><a href="#education" class="education-link">Образование</a></li>
                        <li><a href="#work" class="work-link">Место работы</a></li>
                        <li><a href="#skill" class="skill-link">Навыки</a></li>
                        <li><a href="#about" class="about-link">О себе</a></li>
                        <li><a href="#" class="profile-link">Статистика</a></li>
                        <li>
                            <?= $this->render('__modals')?>
                        </li>
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

        <?php $this->endContent()?>

