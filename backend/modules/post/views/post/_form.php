<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
use backend\modules\references\models\Category;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
\backend\assets\TinyMceCodeAsset::register($this);

/*$this->registerJsFile( '/js/ckeditor_plugins/codesnippet/lib/highlight/highlight.pack.js');

$this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/js/ckeditor_plugins/pbckcode/plugin.js', '');");
$this->registerJs("CKEDITOR.plugins.addExternal('codesnippet', '/js/ckeditor_plugins/codesnippet/plugin.js', '');");
$this->registerJs("hljs.initHighlightingOnLoad()");*/
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

    <? $optionsFile = [
        'name' => 'attachment_53',
        'pluginOptions' => [
            'previewFileType' => 'image',
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Выберите фото',
        ],
        'options' => [
            'accept' => 'image/*',
        ]
    ];
    ($model->isNewRecord) ? : $optionsFile['pluginOptions']['initialPreview'] = [
        Html::img($model->img, ['class' => 'post-image'])
    ]
    ?>

    <?= $form->field($model, 'fileImg')->widget(\kartik\file\FileInput::className(), $optionsFile) ?>

    <?/*= $form->field($model, 'text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
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
    ]]) */?>

    <?= $form->field($model, 'text')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap  print hr preview pagebreak',
                'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
                'save insertdatetime media codesample table contextmenu template paste image'
            ],
            'toolbar' => 'undo redo | styleselect | codesample | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            'images_upload_url' => '/secure/files-upload/test-upload',
            'codesample_languages' =>  [
                ['text' =>  'HTML/XML', 'value' => 'markup'],
                ['text' =>  'Css', 'value' => 'css'],
                ['text' =>  'JavaScript', 'value' => 'javascript'],
                ['text' =>  'PHP', 'value' => 'php'],
                ['text' =>  'Ruby', 'value' => 'ruby'],
                ['text' =>  'Python', 'value' => 'python'],
                ['text' =>  'Java', 'value' => 'java'],
                ['text' =>  'C', 'value' => 'c'],
                ['text' =>  'C#', 'value' => 'csharp'],
                ['text' =>  'C++', 'value' => 'cpp'],
    ],
        ]
    ]);?>

    <?= $form->field($model, 'short_text')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
