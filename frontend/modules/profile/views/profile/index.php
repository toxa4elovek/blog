<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 * @var $educations array
 * @var $postDataProvider \yii\data\ActiveDataProvider
 * @var $commentDataProvider \yii\data\ActiveDataProvider
 */

?>

<div class="row row-wrapper-body row-tabs">
    <div class="column">
        <div class="col-sm-4">
            <div class="lf-profile">
                <div class="ava-block center">
                    <div class="photo-ava">
                        <i class="fa fa-refresh" aria-hidden="true"> Сменить аватар</i>
                        <a href="#">
                            <img class="photo-user" src="img/avatar3.jpg">
                        </a>
                    </div>
                    <div class="link-ava">
                        <input id="tab1" type="radio" class="tab-checked" name="tabs" value="content-tab1" checked>
                        <label for="tab1" title="Профиль"><i class="fa fa-user-o" aria-hidden="true"></i> Профиль</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab2" type="radio" class="tab-checked" name="tabs" value="content-tab2">
                        <label for="tab2" title="Записи"><i class="fa fa-files-o" aria-hidden="true"></i>
                            Записи</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab3" type="radio" class="tab-checked" name="tabs" value="content-tab3">
                        <label for="tab3" title="Закладки"><i class="fa fa-paperclip" aria-hidden="true"></i>
                            Закладки</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab4" type="radio" class="tab-checked" name="tabs" value="content-tab4">
                        <label for="tab4" title="Мои вопросы"><i class="fa fa-question-circle-o"
                                                                 aria-hidden="true"></i> Вопросы</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab5" type="radio" class="tab-checked" name="tabs" value="content-tab5">
                        <label for="tab5" title="Мои ответы"><i class="fa fa-reply-all"
                                                                aria-hidden="true"></i> Ответы</label>
                    </div>
                    <div class="link-ava">
                        <input id="tab6" type="radio" class="tab-checked" name="tabs" value="content-tab6">
                        <label for="tab6" title="Мои комментарии"><i class="fa fa-commenting-o"
                                                                     aria-hidden="true"></i> Комментарии</label>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->render('elements/_profile', ['user' => $user, 'educations' => $educations])?>
        <?= $this->render('elements/_posts', ['postDataProvider' => $postDataProvider])?>
        <?= $this->render('elements/_favourites')?>
        <?= $this->render('elements/_questions')?>
        <?= $this->render('elements/_answers')?>
        <?= $this->render('elements/_comments', ['commentDataProvider' => $commentDataProvider])?>
    </div>
</div>

<?php \frontend\assets\ProfileAsset::register($this);?>