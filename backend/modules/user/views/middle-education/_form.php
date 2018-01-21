<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use kartik\date\DatePicker;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\db\MiddleEducation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="middle-education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\Country::find()->all(), 'id', 'name'), ['id' => 'country_id', 'prompt' => 'Выберите страну...'])?>


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
        ],
        'pluginEvents' => [
            "depdrop:init"=>"function() { console.log(id); console.log(value); console.log(count); }",
            "depdrop:afterChange"=>"function(event, id, value) { console.log(value); }",
        ]
    ];
    ($model->isNewRecord) ? : $cityOptions['data'] = \common\models\db\City::getMainCityArrayByCountryId($model->country_id);
    ?>

    <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), $cityOptions);?>

    <?php $schoolsOptions = [
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions'=>[
            'depends'=>['country_id', 'city_id'],
            'select2Options'=>
                [
                    'pluginOptions'=> [
                        'allowClear'=>true,
                        'minimumInputLength' => 3,
                        'ajax' => [
                            'url' => Url::to(['/user/middle-education/school-list']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(place_id) { return place_id.text; }'),
                        'templateSelection' => new JsExpression('function (place_id) { return place_id.text; }'),
                    ],
                ],
            'initDepends' => ['city_id'],
            'placeholder'=>'Выберите школу...',
            'url'=>Url::to(['/user/middle-education/school-list']),

//        'params'=>['input-type-1', 'input-type-2']
        ],
        /*'pluginEvents' => [
            "depdrop:afterChange"=>"function(event, id, value) { console.log(value); }",
        ]*/
    ];
    ($model->isNewRecord) ? : $schoolsOptions['data'] = $model->place->city->getSchoolsArray();
    ?>


    <?= $form->field($model, 'place_id')->widget(DepDrop::classname(), $schoolsOptions);?>

    <?= $form->field($model, 'user_id')->textInput(['type' => 'hidden', 'value' => $user->id])->label(false)?>

    <?= $form->field($model, 'begin_at')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Выберите дату начала ...'],
        'language' => 'ru',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd'
        ]
    ])?>

    <?= $form->field($model, 'ending_at')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Выберите дату завершения ...'],
        'language' => 'ru',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd'
        ]
    ])?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
