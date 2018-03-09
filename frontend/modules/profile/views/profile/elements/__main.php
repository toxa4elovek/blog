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

    <?php $form = ActiveForm::begin([
        'action' => '/profile/update?id=' . $user->id,
        'options' => ['data-pjax' => true, 'class' => 'form-active'],
        ])?>

    <?= $form->field($user, 'username')->textInput(['placeholder' => 'Логин:'])->label(false)?>

    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken)?>

    <?= $form->field($user, 'email')->textInput(['placeholder' => 'Email:'])->label(false)?>

    <?= $form->field($user->profile, 'name')->textInput(['placeholder' => 'Имя:'])->label(false)?>

    <?= $form->field($user->profile, 'last_name')->textInput(['placeholder' => 'Фамилия:'])->label(false)?>

    <?= $form->field($user->profile, 'gender', [
        'radioTemplate' => '<label class="radio-inline">{input}</label>'])->inline()
        ->radioList($user->profile->getGendersName(), [
            'class' => 'chek-button', 'labelClass' => 'radio-inline'
        ])->label(false)?>

    <div class="form-group">

    <?= \kartik\select2\Select2::widget([
        'model' => ($user->profile->city_id > 0) ? $user->profile->city : new \common\models\db\City(),
        'attribute' => 'country_id',
        'data' => \common\models\db\Country::getCountryList(),
        'theme' => \kartik\select2\Select2::THEME_DEFAULT,
        'pluginOptions' => ['allowClear' => true]
    ])?>
    </div>

    <?php
    $cityOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'options'=>['id'=>'city_id'],
        'language' => 'ru',
        'pluginOptions'=>[
            'depends'=>['city-country_id'],
            'placeholder'=>'Выберите город...',
            'url'=>Url::to(['/profile/education/city-list']),
        ],
        'select2Options' => [
            'theme' => \kartik\select2\Select2::THEME_DEFAULT,
            'pluginOptions' => ['allowClear' => true]
        ]
    ];
    ($user->isNewRecord && $user->profile->city_id > 0) ? : $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($user->profile->city->country_id);
    ?>

    <?= $form->field($user->profile, 'city_id')->widget(DepDrop::classname(), $cityOptions)->label(false)?>


    <div class="button">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end()?>
</div>
<?php Pjax::end()?>
