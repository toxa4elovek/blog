<?php
/**
 * @var $this \yii\web\View
 */
?>


    <div class="col-xs-6">
        <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
            <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])): ?>
                <?= \yii\bootstrap\Alert::widget([
                    'options' => ['class' => 'alert-dismissible alert-' . $type],
                    'body' => $message
                ]) ?>
            <?php endif ?>
        <?php endforeach ?>
    </div>
