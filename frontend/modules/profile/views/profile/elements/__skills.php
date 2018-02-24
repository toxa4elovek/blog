<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */

use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\Pjax;

?>

<?php Pjax::begin(['id' => 'skills-form', 'enablePushState' => false, 'enableReplaceState' => false])?>



<div class="category-profile cat-first" id="skill">

    <?php echo $this->render('_message')?>

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['/profile/skill/save']),
        'options' => [
            'data-pjax' => true
        ]
    ])?>

    <?= Select2::widget([
        'name' => 'Skills',
        'attribute' => 'name',
        'theme' => Select2::THEME_DEFAULT,
        'value' => ArrayHelper::map($user->skills, 'id', 'name'),
        'options' => ['placeholder' => 'Навыки ...', 'multiple' => true, 'id' => 'skill-select2'],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 10,
            'tokenSeparators' => [',', ' '],
            'ajax' => [
                'url' => Url::to(['/profile/skill/find']),
                'dataType' => 'json',
//                'tags' => $skills,
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
        ],
    ])?>

    <div class="button">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end()?>
</div>

<?php Pjax::end()?>