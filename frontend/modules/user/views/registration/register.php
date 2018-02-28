<?php
/**
 * @var $this \yii\web\View
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->registerCssFile('/css/style-registration.css');
?>

<div class="column">
    <div class="col-xs-offset-2 col-xs-8">
        <div class="autorization registr">
            <h2 class="center uppercase">Регистрация</h2>

            <?php $form = ActiveForm::begin([
                'id' => 'registration-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email:'])->label(false) ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Логин:'])->label(false) ?>

            <?php if ($module->enableGeneratingPassword == false): ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль:'])->label(false) ?>

                <?= $form->field($model, 'confirmPassword')->passwordInput(['placeholder' => 'Подтвердите пароль:'])->label(false) ?>
            <?php endif ?>

                <?= $form->field($model, 'agreeRules', ['checkboxTemplate' => "{beginWrapper}\n<div class=\"checkbox\">\n{input}\n
                    <span class='label-checkbox'>Я соглашаюсь с правилами использования ресурса,
                а также передачей и обработкой моих данных.
                Я подтверждаю свою ответственность за размещения информации.</span>\n</div>\n{endWrapper}\n{hint}\n{error}"])->checkbox()?>



            <!--<div class="checkbox">

                <input type="hidden" name="register-form[agreeRules]" value="0">
                <input type="checkbox" id="register-form-agreerules" name="register-form[agreeRules]" value="1" aria-invalid="false">
                Я соглашаюсь с правилами использования ресурса,
                а также передачей и обработкой моих данных. Я подтверждаю свою ответственность за размещения информации.
                <p class="help-block help-block-error"></p>

            </div>-->
            <div class="button-ready">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'ready']) ?>
            </div>




            <div class="registration-footer">
                <div class="registration-footer-link">
                    <p class="text-center">
                        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
                    </p>

                </div>
                <p class="alternative">Или</p>
                <div class="social">

                    <?php $socials = ['facebook', 'vkontakte', 'google', 'twitter']?>

                    <?php foreach ($socials as $social) :?>

                        <?= Html::a(
                            Html::img('/img/source/social/' . $social . '.png', ['width' => 50, 'height' => 50]),
                            ['/user/auth', 'authclient' => $social]
                        )?>

                    <?php endforeach;?>

                </div>

            </div>

            <?php ActiveForm::end(); ?>

            <!--<form action="#" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="login"
                           placeholder="Логин :">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password"
                           placeholder="Пароль :">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm-password"
                           placeholder="Повторите пароль :">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email"
                           placeholder="Email - адрес :">
                </div>
                <div class="form-group checkbox text-justify">
                    <input type="checkbox" name="agreement"> Я соглашаюсь с правилами использования ресурса,
                    а также передачей и обработкой моих данных. Я подтверждаю свою ответственность за размещения информации.
                </div>
                <div class="button-ready">
                    <input type="submit" class="ready" value="Готово">
                </div>
                <div class="registration-footer">
                    <div class="registration-footer-link">
                        <a href="authorization.html">Уже зарегистрированы ? Авторизируйтесь !</a>
                    </div>
                    <p class="alternative">Или</p>
                    <div class="social">
                        <a href="javascript: void 0">
                            <img src="img/facebook.png" width="50px" height="50px" alt="f">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/vkontakte.png" width="50px" height="50px" alt="t">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/google.png" width="50px" height="50px" alt="v">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/twitter.png" width="50px" height="50px" alt="g">
                        </a>
                    </div>
                </div>
            </form>-->
        </div>
    </div>
</div>
