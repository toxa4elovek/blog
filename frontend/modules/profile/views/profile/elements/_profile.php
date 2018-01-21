<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */

use kartik\depdrop\DepDrop;
use yii\helpers\Url;

?>

<div id="content-tab1" class="tab-content-active">
    <div class="col-9">
        <div class="rg-profile profile-prompt">
            <div class="prompt"></div>
        </div>
    </div>
    <div class="col-9 col-pad">
        <div class="rg-profile profile-input clearfix">
            <div class="col-3">
                <div class="main-block-menu">
                    <ul class="menu-main">
                        <li><a href="#main" class="main-link current">Основное</a></li>
                        <li><a href="#education" class="education-link">Образование</a></li>
                        <li><a href="#work" class="work-link">Место работы</a></li>
                        <li><a href="#skill" class="skill-link">Навыки</a></li>
                        <li><a href="#about" class="about-link">О себе</a></li>
                        <li><a href="#" class="profile-link">Статистика</a></li>
                        <li><a href="#" id="change-password-link" class="change-password">Изменить пароль</a></li>
                        <li><a href="#" class="profile-link">Изменить фото</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="category-profile cat-first" id="main">

                    <?php $form = \yii\bootstrap\ActiveForm::begin()?>

                    <?= $form->field($user, 'username')->textInput(['placeholder' => 'Логин:'])->label(false)?>

                    <?= $form->field($user, 'email')->textInput(['placeholder' => 'Email:'])->label(false)?>

                    <?= $form->field($user->profile, 'name')->textInput(['placeholder' => 'Имя:'])->label(false)?>

                    <?= $form->field($user->profile, 'last_name')->textInput(['placeholder' => 'Фамилия:'])->label(false)?>

                    <?= $form->field($user->profile, 'gender', [
                            'radioTemplate' => '<label class="radio-inline">{input}</label>'])->inline()
                        ->radioList($user->profile->getGendersName(), [
                        'class' => 'chek-button', 'labelClass' => 'radio-inline'
                    ])->label(false)?>

                    <?= $form->field($user->profile->city, 'country_id')->widget(\kartik\select2\Select2::className(), [
                        'data' => \common\models\db\Country::getCountryList(),
                        'theme' => \kartik\select2\Select2::THEME_DEFAULT,
                        'pluginOptions' => ['allowClear' => true]

                    ])->label(false)?>

                    <?php
                    $cityOptions = [
                        'type' => DepDrop::TYPE_SELECT2,
                        'options'=>['id'=>'city_id'],
                        'language' => 'ru',
                        'pluginOptions'=>[
                            'depends'=>['city-country_id'],
                            'placeholder'=>'Выберите город...',
                            'url'=>Url::to(['/user/admin/city-list']),
                        ],
                        'select2Options' => [
                            'theme' => \kartik\select2\Select2::THEME_DEFAULT,
                            'pluginOptions' => ['allowClear' => true]
                        ]
                    ];
                    ($model->isNewRecord) ? : $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($user->profile->city->country_id);
                    ?>

                    <?= $form->field($user->profile, 'city_id')->widget(DepDrop::classname(), $cityOptions)->label(false)?>

                    <?php \yii\bootstrap\ActiveForm::end()?>

                   <!-- <form action="#"  class="form-active" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login"
                                   placeholder="Логин :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email"
                                   placeholder="Email :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name"
                                   placeholder="Имя :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="surname"
                                   placeholder="Фамилия :">
                        </div>
                        <div class="chek-button">
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="gender1"> Мужской
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender" value="gender2"> Женский
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city"
                                   placeholder="Город :">
                        </div>
                        <div class="button">
                            <input type="button" class="btn btn-primary" value="Сохранить">
                        </div>
                        <div id="modal_form">
                            <span id="modal_close">X</span>
                            <h2 class="confirm-password">Смена пароля</h2>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="old-password"
                                           placeholder="Старый пароль :">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="new-password"
                                           placeholder="Новый пароль :">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm-password"
                                           placeholder="Повторите пароль :">
                                </div>
                                <div class="form-group">
                                    <input type="button" id="modal_button" class="btn btn-primary"
                                           value="Сохранить">
                                </div>
                            </form>
                        </div>
                        <div id="overlay"></div>
                    </form>-->
                </div>
                <div class="category-profile cat-first" id="education">
                    <form action="#" id="education-form" method="post">
                        <div class="education">
                            <select id="select">
                                <option>Высшее</option>
                                <option>Неоконченное высшее</option>
                                <option>Среднее специальное</option>
                                <option>Среднее</option>
                            </select>
                            <div class="form-group">
                                <input type="text" class="form-control" name="institution"
                                       placeholder="Учебное заведение :">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="faculty"
                                       placeholder="Факультет,специальность :">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="education_city"
                                       placeholder="Город :">
                            </div>
                        </div>
                        <div class="button">
                            <input type="button" id="del-education" class="btn btn-primary  minus" value="-">
                            <input type="button" id="add-education" class="btn btn-primary" value="+">
                            <input type="button" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
                <div class="category-profile cat-first" id="work">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="company_name"
                                   placeholder="Название компании :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="company_city"
                                   placeholder="Город :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="function"
                                   placeholder="Должность :">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="scope"
                                   placeholder="Сфера деятельности :">
                        </div>
                        <div class="button">
                            <input type="button" class="btn btn-primary" value="+">
                            <input type="button" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
                <div class="category-profile cat-first" id="skill">
                    <form action="#" method="post">
                        <div class="form-group skill">
                            <input type="text" class="form-control skill-input" name="skill[]"
                                   placeholder="Навык :">
                        </div>
                        <div class="button">
                            <input type="button" id="del-skill" class="btn btn-primary  minus" value="-">
                            <input type="button" id="add-skill" class="btn btn-primary" value="+">
                            <input type="button" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
                <div class="category-profile cat-first" id="about">
                    <form action="#"  method="post">
                        <div class="form-group">
                                        <textarea class="form-control" name="about_me" placeholder="О себе :"
                                                  cols="30" rows="20"></textarea>
                        </div>
                        <div class="button">
                            <input type="button" class="btn btn-primary" value="+">
                            <input type="button" class="btn btn-primary" value="Сохранить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
