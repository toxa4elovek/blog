<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\category\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\category\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(array_merge([0 => 'Нет'], ArrayHelper::map(Category::getParentCategories(), 'id', 'name'))) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([Category::ACTIVE_CATEGORY => 'Активна', Category::DISABLE_CATEGORY => 'Отключена']) ?>

    <?= $form->field($model, 'type')->dropDownList($model::CATEGORY_TYPES) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
