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

<?php Pjax::begin(['id' => 'education-form', 'enablePushState' => false, 'enableReplaceState' => false])?>

<div class="category-profile cat-first" id="education">

    <?php echo $this->render('_message')?>

    <?php $form = ActiveForm::begin(['action' => '/profile/education/update', 'options' => [
        'id' => 'edu-form',
        'data-pjax' => true,
        'class' => 'form-education'
    ]])?>

    <?= Html::hiddenInput('education-count', count($educations) - count($user->educations), ['id' => 'count'])?>

    <?php foreach ($educations as $iterator => $model) :?>


        <?= $this->render('__education-form', ['form' => $form, 'model' => $model, 'user' => $user, 'iterator' => $iterator])?>


        <?php
            $urlParams = ['/profile/education/delete'];
            if ($model->id) {
                $urlParams['id'] = $model->id;
            }

        ?>

        <?= Html::button('-', [
            'class' => 'btn btn-primary',
            'id' => 'del-education' . $iterator,
            'data-id' => $model->id,
            'onclick' => '$.pjax.reload({
                   id:3,
                   container: "#education", 
                   url: "'.Url::to($urlParams).'", 
                   data: $("#edu-form").serialize(), 
                   method: "post",
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
                   id:2,
                   container: "#education", 
                   url: "' . Url::to(['/profile/education/add-form']) . '", 
                   data: $("#edu-form").serialize(), 
                   method: "post",
                   timeout: 10000, 
                   replace: false,                 
             });'
        ])?>

        <?= Html::submitButton('Сохранить', [
            'class' => 'btn btn-primary',
            /*'id' => 'save-education',
            'onclick' => '$.pjax.reload({
                   id:1,
                   container: "#education", 
                   url: "' . Url::to(['/profile/education/update']) . '", 
                   data: $("#edu-form").serialize(), 
                   method: "post",
                   timeout: 10000, 
                   replace: false,                 
             });'*/
        ])?>
    </div>

    <?php ActiveForm::end() ?>

</div>

<?php Pjax::end() ?>