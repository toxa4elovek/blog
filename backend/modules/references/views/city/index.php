<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use \yii\helpers\ArrayHelper;
use \common\models\db\Country;
use \backend\modules\references\models\CitySearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\references\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'region_id',
                'value' => function($model){
                    /** @var $model \common\models\db\City*/
                    return Html::a($model->region->name, ['/references/region/update', 'id' => $model->region->id]);
                },
                'format' => 'raw',
                'filter' => CitySearch::regionFilter($searchModel->country_id),
            ],
            [
                'attribute' => 'country_id',
                'value' => function($model){
                    /** @var $model \common\models\db\City*/
                    return Html::a($model->country->name, ['/references/country/update', 'id' => $model->country->id]);
                },
                'format' => 'raw',
                'filter' => ArrayHelper::map(Country::find()->all(), 'id', 'name'),
            ],
            'is_main:boolean',
            //'latitude',
            //'longitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
