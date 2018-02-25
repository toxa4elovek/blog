<?php
/**
 * @var $this \yii\web\View
 * @var $postDataProvider \yii\data\ActiveDataProvider
 */
?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $postDataProvider,
    'itemView' => '_post',
    'layout' => '{items}'
])?>
