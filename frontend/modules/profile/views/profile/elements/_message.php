<?php
/**
 * @var $this \yii\web\View
 */
?>



        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                <?= \yii\bootstrap\Alert::widget([
                    'options' => ['class' => 'updated alert-dismissible alert-' . $type],
                    'body' => $message
                ]) ?>
            <?php endif ?>
        <?php endforeach ?>

