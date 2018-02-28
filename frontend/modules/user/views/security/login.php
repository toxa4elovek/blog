<?php
/**
 * @var $this \yii\web\View
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dektrium\user\models\LoginForm;

$this->registerCssFile('/css/style-registration.css');
?>

<?= $this->render('@backend/modules/user/views/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="column">
    <div class="col-xs-offset-2 col-xs-8">
        <div class="autorization registr">
            <h2 class="center uppercase">Авторизация</h2>



            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validateOnBlur' => false,
                'validateOnType' => false,
                'validateOnChange' => false,
            ]) ?>

            <?php if ($module->debug): ?>
                <?= $form->field($model, 'login', [
                    'inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => 'form-control',
                        'tabindex' => '1']])->dropDownList(LoginForm::loginList());
                ?>

            <?php else: ?>

                <?= $form->field($model, 'login',
                    ['inputOptions' => [
                        'autofocus' => 'autofocus',
                        'class' => 'form-control',
                        'tabindex' => '1',
                        'placeholder' => 'Логин:']
                    ]
                )->label(false);
                ?>

            <?php endif ?>

            <?php if ($module->debug): ?>
                <div class="alert alert-warning">
                    <?= Yii::t('user', 'Password is not necessary because the module is in DEBUG mode.'); ?>
                </div>
            <?php else: ?>
                <?= $form->field(
                    $model,
                    'password',
                    ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2', 'placeholder' => 'Пароль:']])
                    ->passwordInput()
                    ->label(false) ?>
            <?php endif ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>

            <div class="button-ready">

                <?= Html::submitButton(
                    Yii::t('user', 'Sign in'),
                    ['class' => 'ready', 'tabindex' => '4']
                ) ?>

                <?php ActiveForm::end(); ?>
            </div>

            <div class="registration-footer">
                <div class="registration-footer-link">
                    <?php if ($module->enableConfirmation): ?>
                        <p class="text-center">
                            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                        </p>
                    <?php endif ?>
                    <?php if ($module->enableRegistration): ?>
                        <p class="text-center">
                            <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
                        </p>
                    <?php endif ?>

                    <?= ($module->enablePasswordRecovery ?
                        Html::a(
                            Yii::t('user', 'Forgot password?'),
                            ['/user/recovery/request'],
                            ['tabindex' => '5']
                        ) : '')?>
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

            <!--<form action="#" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="login"
                           placeholder="Логин :">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password[]"
                           placeholder="Пароль :">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password[]"
                           placeholder="Повторите пароль :">
                </div>
                <div class="button-ready">
                    <input type="submit" class="ready" value="Войти">
                </div>
                <div class="registration-footer">
                    <div class="registration-footer-link">
                        <a href="registration.html">Не зарегистрированы ? Регистрация !</a>
                    </div>
                    <p class="alternative">Или</p>
                    <div class="social">
                        <a href="javascript: void 0">
                            <img src="img/f.png" alt="f">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/t.png" alt="f">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/v.png" alt="f">
                        </a>
                        <a href="javascript: void 0">
                            <img src="img/g.png" alt="f">
                        </a>
                    </div>
                </div>
            </form>-->
        </div>
    </div>
</div>
