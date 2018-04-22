<?php
/**
 * @var $this \yii\web\View
 * @var $commentDataProvider \yii\data\ActiveDataProvider
 * @var $searchModel \frontend\modules\profile\models\SearchForm
 */

use yii\widgets\ListView;
?>
<?php $this->beginContent('@frontend/modules/profile/views/profile/index.php')?>


    <div class="profile-prompt">
        <?= $this->render('search-form', ['searchModel' => $searchModel])?>
    </div>

    <div class="profile-input clearfix">
        <?= ListView::widget([
            'dataProvider' => $commentDataProvider,
            'itemView' => '@frontend/modules/profile/views/profile/itemViews/comments_post',
            'layout' => '{items}',
        ])?>
    </div>



<?php $this->endContent()?>