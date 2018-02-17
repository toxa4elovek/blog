<?php
/**
 * @var $this \yii\web\View
 * @var $user \common\models\db\User
 */
?>

<div class="category-profile cat-first" id="work">
    <form action="#" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="company_name"
                   placeholder="Название компании :">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="company_city"
                   placeholder="Город :">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="function"
                   placeholder="Должность :">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="scope"
                   placeholder="Сфера деятельности :">
        </div>
        <div class="button">
            <input type="button" class="btn btn-primary" value="+">
            <input type="button" class="btn btn-primary" value="Сохранить">
        </div>
    </form>
</div>
