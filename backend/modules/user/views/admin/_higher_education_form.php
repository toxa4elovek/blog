<?php
/**
 * @var $this \yii\web\View
 * @var $higherEducations \common\models\db\HigherEducation[]
 * @var $model \backend\modules\user\models\EducationForm
 */

use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use common\models\db\Country;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use \yii\web\JsExpression;
?>

<?php $this->beginContent('@backend/modules/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
        'id' => 'form-ed',
    'layout' => 'horizontal',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?php /* foreach ($higherEducations as $higherEducation):*/?><!--

    <?/*= $form->field($higherEducation, 'user_id')->textInput(['type' => 'hidden', 'value' => $user->id])->label(false)*/?>

    <?/*= $form->field($higherEducation, 'place_id')->textInput()*/?>

    <?/*= $form->field($higherEducation, 'begin_at')->widget(DatePicker::className())*/?>

    <?/*= $form->field($higherEducation, 'ending_at')->widget(DatePicker::className())*/?>

--><?php /*endforeach;*/?>

<?= $form->field($model, 'country_id')->dropDownList(
    ArrayHelper::map(Country::find()->all(), 'id', 'name'), ['id' => 'country_id', 'prompt' => 'Выберите страну...'])?>

<?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
//    'type' => DepDrop::TYPE_SELECT2,
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
]);?>

<?= $form->field($model, 'place_id')->widget(DepDrop::classname(), [
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
]);?>

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
    <div class="col-lg-offset-3 col-lg-9">
        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>
<?php $form::end()?>
<?php $this->endContent()?>
