<?php
/**
 * @var $this \yii\web\View
 * @var $postDataProvider \yii\data\ActiveDataProvider
 * @var $searchModel \frontend\modules\profile\models\SearchForm
 */
?>

<?php $this->beginContent('@frontend/modules/profile/views/profile/index.php')?>


        <div class="profile-prompt">
            <?= $this->render('search-form', ['searchModel' => $searchModel])?>
        </div>

        <div class="profile-input clearfix">

            <?= \yii\widgets\ListView::widget([
                'dataProvider' => $postDataProvider,
                'itemView' => '@frontend/modules/profile/views/profile/itemViews/post',
                'layout' => '{items}'
            ])?>

        </div>

<?php $this->endContent()?>
