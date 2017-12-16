<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <div class="middle">
        <?php echo \frontend\widgets\HeaderWidget::widget()?>

        <?php $isMainPage = Yii::$app->controller->id === 'pages' && Yii::$app->controller->action->id === 'index'?>
        <?php if($isMainPage):?>
            <div class="container-fluid">
                <div class="row">
                    <?php echo \frontend\widgets\HeaderSlideWidget::widget(['items' => $this->params['items']])?>
                </div>
            </div>
        <?php endif;?>

        <div class="container-fluid main_catalog">
            <div class="row">
                <div class="col-sm-3">

                    <?php echo \frontend\widgets\LeftCategoryWidget::widget()?>

                </div>
                <div class="col-sm-9">

                    <?= $content  ?>

                </div>
            </div>
        </div>

        <a href="#" class="scrollup">Наверх</a>

        <?php if($isMainPage):?>
        <div class="container-fluid">
            <div class="row">
                <?php echo \frontend\widgets\FooterSlideWidget::widget(['items' => $this->params['items']])?>
            </div>
        </div>
        <?php endif;?>
    </div>
<?php echo \frontend\widgets\FooterWidget::widget()?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
