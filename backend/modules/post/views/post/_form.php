<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
use backend\modules\category\models\Category;
use yii\helpers\ArrayHelper;
$this->registerJsFile( '/js/ckeditor_plugins/codesnippet/lib/highlight/highlight.pack.js');

$this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/js/ckeditor_plugins/pbckcode/plugin.js', '');");
$this->registerJs("CKEDITOR.plugins.addExternal('codesnippet', '/js/ckeditor_plugins/codesnippet/plugin.js', '');");
$this->registerJs("hljs.initHighlightingOnLoad()");
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'categories')->widget(\kartik\select2\Select2::className(), [
            'data' => ArrayHelper::map(Category::findAll(['status' => Category::ACTIVE_CATEGORY]), 'id', 'name'),
            'options' => ['multiple' => true, 'placeholder' => 'Выберите категории ...']
    ])?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([
            $model::STATUS_MODERATION => 'На модерации',
            $model::STATUS_ACTIVE => 'Активно',
            $model::STATUS_DELETED => 'Удалено'
        ]) ?>

    <?= $form->field($model, 'fileImg')->widget(\kartik\file\FileInput::className(), [
        'name' => 'attachment_53',
        'pluginOptions' => [
            'previewFileType' => 'image',
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Выберите фото',
            'initialPreview'=>[
                Html::img($model->img, ['class' => 'post-image'])
            ],
        ],
        'options' => ['accept' => 'image/*']
    ]) ?>

    <?= $form->field($model, 'text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 8],
        'preset' => 'basic',
        'clientOptions' => [
            'filebrowserImageUploadUrl' => '/secure/files-upload/upload',
            'extraPlugins' => 'pbckcode',
            'pbckcode' => [
                    'highlighter' => 'PRETTIFY',
                    'modes' => [['HTML', 'html'], ['CSS', 'css'], ['PHP', 'php'], ['JS', 'javascript'], ['C/C++', 'c_cpp']],
                    'theme' => 'ambiance',

            ],
            'toolbarGroups' => [
                ['name' => 'undo'],
                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                ['name' => 'colors'],
                ['name' => 'links', 'groups' => ['links', 'insert']],
                ['name' => 'others', 'groups' => ['others', 'about']],
                ['name' => 'pbckcode'],
                ['name' => 'styles'],
                ['name' => 'paragraph','groups' => ['list', 'indent', 'blocks']],
                ['name' => 'align'],
                ['name' => 'document', 'groups' => [ 'mode', 'document', 'doctools' ]],
                ['name' => 'editing' , 'groups' => [ 'find', 'selection', 'spellchecker' ]],
        ]
    ]]) ?>

    <?= $form->field($model, 'short_text')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
