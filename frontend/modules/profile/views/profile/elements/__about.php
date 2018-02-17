<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */
?>

<div class="category-profile cat-first" id="about">
    <form action="#"  method="post">
        <div class="form-group">
                                        <textarea class="form-control" name="about_me" placeholder="О себе :"
                                                  cols="30" rows="20"></textarea>
        </div>
        <div class="button">
            <input type="button" class="btn btn-primary" value="+">
            <input type="button" class="btn btn-primary" value="Сохранить">
        </div>
    </form>
</div>
