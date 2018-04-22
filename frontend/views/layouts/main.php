<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <div class="container-fluid container-fluid-content">
        <?php echo \frontend\widgets\HeaderWidget::widget()?>

        <div class="row row-wrapper-body">


                <?= $content  ?>


        </div>

        <?php echo \frontend\widgets\FooterWidget::widget()?>

        <a href="#" class="scrollup">Наверх</a>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
