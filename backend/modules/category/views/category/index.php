<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\category\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\category\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php \common\classes\Debug::prn('aasd')?>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'parent_id',
                'value' => function($model){
                    return Category::getParentCategoryName($model->parent_id);
                },
                'filter' => [Category::ACTIVE_CATEGORY => 'Активна', Category::DISABLE_CATEGORY => 'Отключена'],
            ],
            'slug',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if ((int)$model->status === 1) {
                        return 'Активна';
                    }else return 'Отключена';
                },
                'filter' => [Category::ACTIVE_CATEGORY => 'Активна', Category::DISABLE_CATEGORY => 'Отключена'],
            ],
            [
                'attribute' => 'type',
                'value' => function($model){
                    return $model::CATEGORY_TYPES[$model->type];
                },
                'filter' => Category::CATEGORY_TYPES,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
