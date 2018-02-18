<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 * @var $educations \common\models\db\Education[]
 */

use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php Pjax::begin(['id' => 'education-form', 'enableReplaceState' => true])?>

<div class="category-profile cat-first" id="education">

    <?php echo $this->render('_message')?>

    <?php $form = ActiveForm::begin(['action' => '/profile/education/update' . $user->id, 'options' => ['data-pjax' => true]])?>

    <?= Html::hiddenInput('education-count', count($educations) - count($user->educations), ['id' => 'count'])?>

    <?php foreach ($educations as $iterator =>  $model) :?>


        <?= $this->render('__education-form', ['form' => $form, 'model' => $model, 'user' => $user, 'iterator' => $iterator])?>

        <?= Html::button('-', [
            'class' => 'btn btn-primary',
            'id' => 'del-education' . $iterator,
            'data-id' => $model->id,
            'onclick' => '$.pjax.reload({
                   container: "#education", 
                   url: "'.Url::to(['/profile/education/remove-form']).'", 
                   data: {model_id: $(this).data("id")}, 
                   timeout: 10000, 
                   replace: false,
             });'
        ])?>

    <?php endforeach;?>

    <div class="button">
        <?= Html::button('+', [
            'class' => 'btn btn-primary',
            'id' => 'add-education',
            'onclick' => '$.pjax.reload({
                   container: "#education", 
                   url: "'.Url::to(['/profile/education/add-form']).'", 
                   data: {count: $("#count").val()}, 
                   timeout: 10000, 
                   replace: false,                 
             });'
        ])?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end() ?>

</div>

<?php Pjax::end() ?>