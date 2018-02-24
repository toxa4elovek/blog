<?php
/**
 * @var $this \yii\web\View
 * @var $model \common\models\db\Education
 * @var $iterator integer
 */
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use common\models\db\Country;
use yii\helpers\Url;
use kartik\select2\Select2;


?>

    <?= $form->field($model, '['. $iterator .']type')->widget(Select2::className(), [
        'data' => $model::getTypes(),
        'options' => ['id' => 'type-' . $iterator,  'prompt' => 'Выберите тип...'],
        'theme' => Select2::THEME_DEFAULT,
    ])->label(false)?>

    <?= $form->field($model, '['. $iterator .']id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, '['. $iterator .']country_id')->widget(Select2::className(),[
        'data' => ArrayHelper::map(Country::find()->all(), 'id', 'name'),
        'options' => ['id' => 'country-' . $iterator, 'prompt' => 'Выберите страну...'],
        'theme' => Select2::THEME_DEFAULT,
    ])->label(false)?>

    <?php
    $cityOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'city-' . $iterator],
        'select2Options' => [
            'theme' => Select2::THEME_DEFAULT,
        ],
        'pluginOptions' => [
            'depends' => ['country-' . $iterator],
            'placeholder' => 'Выберите город...',
            'url' => Url::to(['/profile/education/city-list']),
        ]
    ];
    ($model->isNewRecord) ?: $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($model->place->city->country_id);
    ?>

    <?= $form->field($model, '['. $iterator .']city_id')->widget(DepDrop::classname(), $cityOptions)->label(false); ?>


    <?php $educationPlaceOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'place-' . $iterator],
        'select2Options' => [
            'theme' => Select2::THEME_DEFAULT,
        ],
        'pluginOptions' => [
            'depends' => ['city-' . $iterator, 'type-' . $iterator],
            'select2Options' => [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 2,
                        'theme' => Select2::THEME_DEFAULT,
                    ],
                ],

            'placeholder' => 'Выберите учебное заведение...',
            'url' => Url::to(['/profile/education/university-list']),
        ]
    ];
    ($model->isNewRecord) ? : $educationPlaceOptions['data'] = $model->place->city->getEducationPlaceArray((int)$model->type);
    ?>


    <?= $form->field($model, '['. $iterator .']place_id')->widget(DepDrop::classname(), $educationPlaceOptions)->label(false); ?>

    <?= $form->field($model, '['. $iterator .']user_id')->textInput(['type' => 'hidden', 'value' => $user->id])->label(false) ?>

    <?php $separator = '<span class="input-group-addon kv-field-separator">-</span>' ?>

    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => '['. $iterator .']begin_at',
        'attribute2' => '['. $iterator .']ending_at',
        'options' => ['placeholder' => 'Дата начала', 'class' => 'input-radius-left'],
        'options2' => ['placeholder' => 'Дата окончания', 'class' => 'input-radius-right'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ],
        'layout' => "{input1}{$separator}{input2}"
    ]); ?>

<hr style="margin-bottom: 20px">
