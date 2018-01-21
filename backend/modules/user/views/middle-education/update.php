<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\MiddleEducation */

$this->title = Yii::t('app', 'Update Middle Education: #{nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Middle Educations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?php $this->beginContent('@backend/modules/user/views/admin/update.php', ['user' => $user]) ?>

<div class="middle-education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user
    ]) ?>

</div>

<?php $this->endContent()?>