<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\Education */

$this->title = Yii::t('app', 'Create Education');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Educations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
