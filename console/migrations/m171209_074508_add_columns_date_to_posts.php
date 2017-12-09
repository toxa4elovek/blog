<?php

use yii\db\Migration;
use yii\db\Expression;
/**
 * Class m171209_074508_add_columns_date_to_posts
 */
class m171209_074508_add_columns_date_to_posts extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('post', 'created_at', $this->dateTime()->defaultValue(New Expression('NOW()')));
        $this->addColumn('post', 'updated_at', $this->dateTime()->defaultValue(New Expression('NOW()')));
    }

    public function down()
    {
        $this->dropColumn('post', 'created');
        $this->dropColumn('post', 'updated');
    }
}
