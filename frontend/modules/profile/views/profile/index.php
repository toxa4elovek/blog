<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 * @var $educations array
 * @var $postDataProvider \yii\data\ActiveDataProvider
 * @var $commentDataProvider \yii\data\ActiveDataProvider
 * @var $content string
 */

?>

<div class="row row-wrapper-body row-tabs">
    <div class="column">
        <div class="col-sm-4">
            <?= $this->render('elements/_menu')?>
        </div>

        <div class="col-sm-8 col-pad">

            <?= $content?>

        </div>
    </div>
</div>

<?php \frontend\assets\ProfileAsset::register($this);?>