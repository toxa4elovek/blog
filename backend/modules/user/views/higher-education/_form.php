<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use common\models\db\Country;
use yii\helpers\Url;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model \backend\modules\user\models\HigherEducationForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="higher-education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?/*= $form->field($model, 'place_id')->textInput() */?><!--

    <?= $form->field($model, 'user_id')->textInput(['type' => 'hidden']) ?>

    <?/*= $form->field($model, 'begin_at')->textInput() */?>

    --><?/*= $form->field($model, 'ending_at')->textInput() */?>

    <?= $form->field($model, 'country_id')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'), ['id' => 'country_id', 'prompt' => 'Выберите страну...'])?>

    <?php
        $cityOptions = [
            'type' => DepDrop::TYPE_SELECT2,
            'options'=>['id'=>'city_id'],
            'pluginOptions'=>[
                'depends'=>['country_id'],
                /*'select2Options'=>
                    [
                        'pluginOptions'=> [
                            'allowClear'=>false,
                            'minimumInputLength' => 3,
                            'ajax' => [
                                'url' => Url::to(['/user/admin/city-list']),
                                'dataType' => 'json',
                                'data' => new JsExpression('function(params) { return {q:params.term}; }')
                            ],
                            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                            'templateResult' => new JsExpression('function(place_id) { return place_id.text; }'),
                            'templateSelection' => new JsExpression('function (place_id) { return place_id.text; }'),
                        ],
                    ],*/
                'placeholder'=>'Выберите город...',
                'url'=>Url::to(['/user/admin/city-list'])
            ]
        ];
    ($model->isNewRecord) ? : $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($model->country_id);
    ?>

    <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), $cityOptions);?>

    <?php $universityOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions'=>[
            'depends'=>['country_id', 'city_id'],
            'select2Options'=>
                [
                    'pluginOptions'=> [
                        'allowClear'=>true,
                        'minimumInputLength' => 3,
                        /*'ajax' => [
                            'url' => Url::to(['/user/admin/place-list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(place_id) { return place_id.text; }'),
                        'templateSelection' => new JsExpression('function (place_id) { return place_id.text; }'),*/
                    ],
                ],

            'placeholder'=>'Выберите университет...',
            'url'=>Url::to(['/user/admin/place-list']),
//        'params'=>['input-type-1', 'input-type-2']
        ]
    ];
    ($model->isNewRecord) ? : $universityOptions['data'] = $model->place->city->getUniversityArray();
    ?>


    <?= $form->field($model, 'place_id')->widget(DepDrop::classname(), $universityOptions);?>

    <?= $form->field($model, 'user_id')->textInput(['type' => 'hidden', 'value' => $user->id])->label(false)?>

    <?= $form->field($model, 'begin_at')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Выберите дату начала ...'],
        'dateFormat' => 'php:Y-m-d'
    ])?>

    <?= $form->field($model, 'ending_at')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Выберите дату завершения ...'],
        'dateFormat' => 'php:Y-m-d'
    ])?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
