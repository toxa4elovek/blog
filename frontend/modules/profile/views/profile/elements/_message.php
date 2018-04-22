<?php
/**
 * @var $this \yii\web\View
 */

use kartik\alert\AlertBlock;

echo AlertBlock::widget([
    'type'            => AlertBlock::TYPE_GROWL,
    'useSessionFlash' => true,
    'delay'           => 50,
    'alertSettings'   => [
        'success' => [
            'type'  => 'success',
        ],
        'error' => [
            'type'  => 'danger',
        ]
    ]
]);
?>


        <?php /*foreach (Yii::$app->session->getAllFlashes() as $type => $message): */?><!--
            <?php /*if (in_array($type, ['success', 'danger', 'warning', 'info'])): */?>
                <?/*= Alert::widget([
                    'options' => ['class' => 'updated alert-dismissible alert-' . $type],
                    'body'    => $message,
                    'delay'   => 1000
                ]) */?>
            <?php /*endif */?>
        --><?php /*endforeach */?>

