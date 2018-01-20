<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\user\models\HigherEducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Higher Educations');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginContent('@backend/modules/user/views/admin/update.php', ['user' => $user]) ?>

<div class="higher-education-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Higher Education'), ['create', 'user_id' => $user->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'place_id',
                'value' => function ($model) {
                    return $model->place->name;
                }
            ],
//            'user_id',
            'begin_at',
            'ending_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php $this->endContent()?>
