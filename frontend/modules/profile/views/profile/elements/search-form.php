<?php
/**
 * @var $this \yii\web\View
 * @var $searchModel \frontend\modules\profile\models\SearchForm
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;
?>
<div class="row prompt">

<?php $form = ActiveForm::begin([
    'fieldConfig' => [
        'template' => '{input}',
        'options' => ['tag' => false]
    ]
])?>
    <div class="col-sm-12 form-group search-and-button">
       <!-- <input type="search" class="form-control search-by-word" name="search-by-word" placeholder="Поиск по слову...">
        <input type="submit" class="btn btn-primary" value="Найти">-->

        <?= $form->field($searchModel, 'text')->textInput([
            'class' => 'form-control search-by-word',
            'placeholder' => 'Поиск...'
        ])?>

        <?= Html::submitButton('Найти', ['class' => 'btn btn-primary'])?>

    </div>

    <div class="col-sm-6 select-category">
        <?= $form->field($searchModel, 'categoryIds')->widget(\kartik\select2\Select2::className(), [
            'data' => \common\models\db\Category::getCategoryList(),
            'theme' => \kartik\select2\Select2::THEME_DEFAULT,
            'pluginOptions' => [
                'multiple' => true,
                'placeholder' => 'Категории...'
            ]
        ])?>
    </div>

    <?php $separator = '<span class="input-group-addon kv-field-separator">-</span>' ?>

    <div class="col-sm-6 form-group input-date">

        <?= DatePicker::widget([
            'model' => $searchModel,
            'attribute' => 'dateFrom',
            'attribute2' => 'dateTo',
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
    </div>

<?php ActiveForm::end()?>
</div>