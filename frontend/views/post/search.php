<?php
/**
 * @var $this \yii\web\View
 * @var $searchModel \frontend\models\PostSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $category \common\models\db\Category
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = $category->name;
?>

<div class="column">

    <?php echo \frontend\widgets\LeftCategoryWidget::widget(['category' => \common\models\db\Category::find()->all()])?>

    <div class="col-sm-8">
        <div class="body-header">
            <h2 class="namе-group"><?= $category->name?></h2>
        </div>

        <?php $form = ActiveForm::begin(['options' => ['class' => 'form-inline']])?>

        <?= $form->field($searchModel, 'type')->dropDownList($searchModel::getTypes(),
            ['prompt' => 'Выберите тип'])->label(false)?>

        <?= $form->field($searchModel, 'searchText')->textInput(['placeholder' => 'Введите поисковой запрос...'])->label(false)?>

        <?= Html::submitButton('Поиск')?>

        <?php ActiveForm::end()?>
        <?php echo \frontend\widgets\PostsWidget::widget(['postDataProvider' => $dataProvider]) ?>

    </div>
</div>
