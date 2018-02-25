<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\db\Post;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\post\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->registerJsFile('/js/ckeditor_plugins/codesnippet/lib/highlight/highlight.pack.js');
$this->registerCssFile('/js/ckeditor_plugins/codesnippet/lib/highlight/styles/solarized_dark.css');
$this->registerJs("hljs.initHighlightingOnLoad()");

$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать пост', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Задать вопрос', ['/post/question/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return Html::a($model->user->username, ['/user/admin/update', 'id' => $model->user_id]);
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return Post::getTypeById($model->type);
                },
                'filter' => \common\models\db\Post::getTypes()
            ],
            [
                'attribute' => 'categories',
                'value' => function ($model) {
                    $categories = \yii\helpers\ArrayHelper::getColumn($model->categories, 'name');
                    return (count($categories) > 1) ? implode(', ', $categories): $categories[0];
                },
                'filter' => \kartik\select2\Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'categoryIds',
                    'data' => \common\models\db\Category::getCategoryList(),
                    'options' => ['multiple' => true, 'prompt' => 'Выберите категорию'],
                    'value' => $searchModel->categoryIds,
                    'hideSearch' => true
                ])
            ],
            [
                'format' => 'raw',
                'attribute' => 'title',
                'value' => function($model){
                    return $model->title;
                }
            ],
            'status',
            [
                'format' => 'raw',
                'attribute' => 'img',
                'value' => function($model) {
                    if($model->img !== '') {
                        return Html::img($model->img, ['class' => 'post-image']);
                    }return '';
                },
                'contentOptions' => ['style'=>'max-width: 300px;'],
            ],
            [
                'format' => 'text',
                'attribute' => 'short_text',
                'value' => function($model){
                    return $model->short_text;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'edit' => function ($url, $model) {
                        if ($model->type === Post::TYPE_QUESTION) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/post/question/update', 'id' => $model->id]);
                        }

                        return $url;
                    }
                ]
            ],
        ],
    ]); ?>
</div>
