<?php
/**
 * @var $this \yii\web\View
 */

use yii\helpers\Url;
?>

<div class="lf-profile lf-profile-tab">
    <?= \yii\widgets\Menu::widget([
        'itemOptions' => [
            'class' => 'link-profile link-preview-profile',
            'tag' => 'div'
        ],
        'options' => [
            'class' => 'ava-block center',
            'tag' => 'div'
        ],
        //'activateItems' => true,
        'activeCssClass' => 'active-menu',
        'items' => [
            [
                'label' => 'Резюме',
                'url' => Url::to(['profile/index']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-file-text-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Записи',
                'url' => Url::to(['profile/posts']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Статистика',
                'url' => Url::to(['profile/favourites']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-paperclip" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Вопросы',
                'url' => Url::to(['profile/questions']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-question-circle-o" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Ответы',
                'url' => Url::to(['profile/answers']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-reply-all" aria-hidden="true"></i>{label}</a>'
            ],
            [
                'label' => 'Комментарии',
                'url' => Url::to(['profile/comments']),
                'template' => '<a href="{url}" class="profile-menu"><i class="fa fa-commenting-o" aria-hidden="true"></i>{label}</a>'
            ],
        ]
    ])?>
</div>


