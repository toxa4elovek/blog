<?php
/**
 *
 */

namespace frontend\modules\user\models;


class RegistrationForm extends \dektrium\user\models\RegistrationForm
{
    public $confirmPassword;
    public $agreeRules;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['confirmPassword'], 'required', 'message' => 'Необходимо подтвердить пароль'],
            ['password', 'compare', 'compareAttribute' => 'confirmPassword', 'message' => ['Введенный пароли не совпадают']],
            ['agreeRules', 'required', 'requiredValue' => 1, 'message' => 'Необходимо принять правила использования ресурса']
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'confirmPassword' => \Yii::t('app', 'Confirm Password'),
            'agreeRules' => 'Я соглашаюсь с правилами использования ресурса,
                а также передачей и обработкой моих данных.
                Я подтверждаю свою ответственность за размещения информации.'
        ]);
    }

}