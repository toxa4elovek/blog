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
            'id' => 'del-education',
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
    <!--<form action="#" id="education-form" method="post">
        <div class="education">
            <select id="select">
                <option>Высшее</option>
                <option>Неоконченное высшее</option>
                <option>Среднее специальное</option>
                <option>Среднее</option>
            </select>
            <div class="form-group">
                <input type="text" class="form-control" name="institution"
                       placeholder="Учебное заведение :">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="faculty"
                       placeholder="Факультет,специальность :">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="education_city"
                       placeholder="Город :">
            </div>
        </div>
        <div class="button">
            <input type="button" id="del-education" class="btn btn-primary  minus" value="-">
            <input type="button" id="add-education" class="btn btn-primary" value="+">
            <input type="button" class="btn btn-primary" value="Сохранить">
        </div>
    </form>-->
</div>

<?php Pjax::end() ?>