<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */
/*$this->registerJsFile( '/js/ckeditor_plugins/codesnippet/lib/highlight/highlight.pack.js');

$this->registerJs("CKEDITOR.plugins.addExternal('pbckcode', '/js/ckeditor_plugins/pbckcode/plugin.js', '');");
$this->registerJs("CKEDITOR.plugins.addExternal('codesnippet', '/js/ckeditor_plugins/codesnippet/plugin.js', '');");
$this->registerJs("hljs.initHighlightingOnLoad()");*/
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1><?php echo $model->title?></h1>
    <div><?php echo $model->text?></div>
    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'category_id',
            'title',
            'slug',
            'status',
            'img',
            'text:ntext',
            'short_text',
        ],
    ]) */?>

</div>
