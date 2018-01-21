<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\MiddleEducation */

$this->title = Yii::t('app', 'Create Middle Education');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Middle Educations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginContent('@backend/modules/user/views/admin/update.php', ['user' => $user]) ?>
<div class="middle-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user
    ]) ?>

</div>

<?php $this->endContent()?>