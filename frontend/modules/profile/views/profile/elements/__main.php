<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */

use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
?>

<?php Pjax::begin(['id' => 'main-form', 'enablePushState' => false])?>

<div class="category-profile cat-first" id="main">

    <?php echo $this->render('_message')?>

    <?php $form = ActiveForm::begin(['action' => '/profile/update?id=' . $user->id, 'options' => ['data-pjax' => true]])?>

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
    ($user->isNewRecord) ? : $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($user->profile->city->country_id);
    ?>

    <?= $form->field($user->profile, 'city_id')->widget(DepDrop::classname(), $cityOptions)->label(false)?>


    <div class="button">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end()?>
</div>
<?php Pjax::end()?>
