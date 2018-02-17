<?php
/**
 * @var $this \yii\web\View
 */

use yii\bootstrap\Modal;
?>

<?php
Modal::begin([
    'header' => '<h2>Смена пароля</h2>',
    'toggleButton' => ['label' => 'Изменить пароль',
        'tag' => 'a'
    ],
]);

echo '<form action="#" method="post">
          <div class="form-group">
              <input type="password" class="form-control" name="old-password"
                     placeholder="Старый пароль :">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="new-password"
                     placeholder="Новый пароль :">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="confirm-password"
                     placeholder="Повторите пароль :">
          </div>
          <div class="form-group">
              <input type="button" id="modal_button" class="btn btn-primary"
                     value="Сохранить" data-dismiss="modal">
          </div>
       </form>';
?>
<?php
Modal::end();
?>

