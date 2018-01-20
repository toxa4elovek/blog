<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\db\HigherEducation */

$this->title = Yii::t('app', 'Create Higher Education');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Higher Educations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginContent('@backend/modules/user/views/admin/update.php', ['user' => $user]) ?>
<div class="higher-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php $this->endContent()?>
