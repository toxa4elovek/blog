<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */

use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
?>

<div class="lf-profile">

    <?php
    $user = Yii::$app->user->identity;

    Modal::begin([
        'header' => 'Выберите фото для загрузки',
        'id'     => 'change-avatar',
    ]);
    $form = ActiveForm::begin([
        'action'  => '/profile/profile/upload',
        'options' => ['enctype'=>'multipart/form-data']
    ]);
    echo FileInput::widget([
        'name' => 'Avatar[file]'
    ]);


    ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Загрузить', ['class' => 'btn btn-primary']);?>
    </div>
    <?php
    ActiveForm::end();
    Modal::end();
        $hasAvatar   = (bool) $user->getAvatarUrl();
        $avatarClass = ($hasAvatar) ? 'unique-avatar' : 'none-avatar';
        $avatarTag   = ($hasAvatar)
            ? '<img class="photo-user" src="'. $user->getAvatarUrl() . '">'
            : '<div class="letter-ava">' . $user->username[0] . '</div>';

        $avatarBlock = '<div class="' . $avatarClass . '" data-toggle="modal" data-target="#change-avatar">
                <a href="#">
                    ' . $avatarTag . '
                    <div class="change-ava">
                        <span>Загрузить фото</span>
                        <i class="fa fa-download fa-2x"></i>
                    </div>
                </a>
            </div>
            ';

    ?>

    <?= \yii\widgets\Menu::widget([
        'itemOptions' => [
            'class' => 'link-profile',
            'tag' => 'div'
        ],
        'options' => [
            'class' => 'ava-block',
            'tag' => 'div'
        ],
        //'activateItems' => true,
        'activeCssClass' => 'active-menu',
        'items' => [
            [
                'options' => ['class' => 'photo-ava'],
                'template' => $avatarBlock
            ],
            [
                'label' => 'Профиль',
                'url' => Url::to(['profile/index']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-user-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Записи',
                'url' => Url::to(['profile/posts']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-files-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Закладки',
                'url' => Url::to(['profile/favourites']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-paperclip" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Вопросы',
                'url' => Url::to(['profile/questions']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-question-circle-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Ответы',
                'url' => Url::to(['profile/answers']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-reply-all" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Комментарии',
                'url' => Url::to(['profile/comments']),
                'template' => '<a href="{url}" class="profile-menu tab-checked"><i class="fa fa-commenting-o" aria-hidden="true"></i>{label}</a>'
            ],
        ]
    ])?>
</div>
