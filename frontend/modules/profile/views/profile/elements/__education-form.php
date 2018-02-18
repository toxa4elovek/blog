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


?>
    <?= $form->field($model, '['. $iterator .']id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, '['. $iterator .']type')->dropDownList($model::getTypes(), ['id' => 'type-' . $iterator]) ?>

    <?= $form->field($model, '['. $iterator .']country_id')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'), ['id' => 'country-' . $iterator, 'prompt' => 'Выберите страну...']) ?>

    <?php
    $cityOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'city-' . $iterator],
        'pluginOptions' => [
            'depends' => ['country-' . $iterator],
            'placeholder' => 'Выберите город...',
            'url' => Url::to(['/profile/education/city-list'])
        ]
    ];
    ($model->isNewRecord) ?: $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($model->place->city->country_id);
    ?>

    <?= $form->field($model, '['. $iterator .']city_id')->widget(DepDrop::classname(), $cityOptions); ?>


    <?php $educationPlaceOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id' => 'place-' . $iterator],
        'pluginOptions' => [
            'depends' => ['city-' . $iterator, 'type-' . $iterator],
            'select2Options' =>
                [
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 2,
                    ],
                ],

            'placeholder' => 'Выберите учебное заведение...',
            'url' => Url::to(['/profile/education/university-list']),
        ]
    ];
    ($model->isNewRecord) ? : $educationPlaceOptions['data'] = $model->place->city->getEducationPlaceArray((int)$model->type);
    ?>


    <?= $form->field($model, '['. $iterator .']place_id')->widget(DepDrop::classname(), $educationPlaceOptions); ?>

    <?= $form->field($model, '['. $iterator .']user_id')->textInput(['type' => 'hidden', 'value' => $user->id])->label(false) ?>

    <?php $separator = '<span class="input-group-addon kv-field-separator">-</span>' ?>

    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => '['. $iterator .']begin_at',
        'attribute2' => '['. $iterator .']ending_at',
        'options' => ['placeholder' => 'Дата начала'],
        'options2' => ['placeholder' => 'Дата окончания'],
        'type' => DatePicker::TYPE_RANGE,
        'form' => $form,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ],
        'layout' => "{input1}{$separator}{input2}"
    ]); ?>

<hr style="margin-bottom: 20px">
