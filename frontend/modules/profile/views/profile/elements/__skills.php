<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */
?>

<div class="category-profile cat-first" id="skill">
    <form action="#" method="post">
        <div class="form-group skill">
            <input type="text" class="form-control skill-input" name="skill[]"
                   placeholder="Навык :">
        </div>
        <div class="button">
            <input type="button" id="del-skill" class="btn btn-primary  minus" value="-">
            <input type="button" id="add-skill" class="btn btn-primary" value="+">
            <input type="button" class="btn btn-primary" value="Сохранить">
        </div>
    </form>
</div>
