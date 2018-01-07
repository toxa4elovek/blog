### Зависимости:

+ PHP 7.0
  + extension Memcached
  + extension Intl
- MySQL 5.6


### Установка:
> Перейти в директорию со скачанным репазиторием
1. запустить команду ```$ composer update```
2. запустить команду ```$ init```
>Выбрать 1 - Production
3. запустить команды
  ```
  $ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
  $ php yii migrate/up --migrationPath=@yii/rbac/migrations
  $ php yii migrate/up
  ```
4. Выполнить команду для заполнения регионов и стран
  ```
  $ php yii vk-location
  ```
5. Настроить пути на точки входа
  ```
  backend\web\index.php - админка
  frontend\web\index.php - фронт сайт
  ```
  
