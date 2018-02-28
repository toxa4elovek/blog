<?php
/**
 * @var $this \yii\web\View
 * @var $posts array
 * @var $postDataProvider \yii\data\ActiveDataProvider
 * @var $post \backend\modules\post\models\Post
 */

use common\classes\Debug;
?>
<div class="body-list">
    <ul class="block-list block-list-post abbreviated-list" id="posts-list">

        <?= $this->render('blocks/_loop', ['postDataProvider' => $postDataProvider])?>

    </ul>
</div>

<?php if ($postDataProvider->totalCount > $postDataProvider->pagination->pageSize): ?>

    <div class="more-post">
        <a class="more-post-button" id="show-more-post">
            <svg>
                <line x1="0" y1="0" x2="100" y2="40" stroke="black" stroke-width="3"/>
                <line x1="200" y1="0" x2="100" y2="40" stroke="black" stroke-width="3"/>
            </svg>
        </a>
    </div>


    <?php $this->registerJs("
    jQuery(function($)
        {
            // запоминаем текущую страницу и их максимальное количество
            var page = parseInt('" . (int)Yii::$app->request->get('page', 1) ."');
            var pageCount = parseInt('". (int)$postDataProvider->pagination->pageCount."');
            var loadingFlag = false;
            
            $('#show-more-post').click(function()
            {
            console.log(page);
            console.log(pageCount);
                // защита от повторных нажатий
                if (!loadingFlag)
                {
                    // выставляем блокировку
                    loadingFlag = true;
                    // отображаем анимацию загрузки

                    $.ajax({
                        type: 'post',
                        url: window.location.href,
                        data: {
                            // передаём номер нужной страницы методом POST
                            'page': page + 1,
                            '" . Yii::$app->request->csrfToken ."': '" . Yii::$app->request->csrfToken . "'
                        },
                        success: function(data)
                        {
                            // увеличиваем номер текущей страницы и снимаем блокировку
                            page++;
                            loadingFlag = false;

                            // прячем анимацию загрузки

                            // вставляем полученные записи после имеющихся в наш блок
                            $('#posts-list').append(data);

                            // если достигли максимальной страницы, то прячем кнопку
                            if (page >= pageCount)
                                $('#show-more-post').hide();
                        }
                    });
                }
                return false;
            })
        });", \yii\web\View::POS_END)?>

<?php endif; ?>

<?php if ($postDataProvider->totalCount > $postDataProvider->pagination->pageSize) :?>

    

<?php endif;?>
