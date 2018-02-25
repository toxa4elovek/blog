<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\post\models\Post */

$this->title = 'Задать вопрос';
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['/post/post/index', 'PostSearch[type]' => 2]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
