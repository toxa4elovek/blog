<?php

use yii\db\Migration;

/**
 * Class m171112_115226_create_table_category
 */
class m171112_115226_create_table_category extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->defaultValue(''),
            'parent_id' => $this->integer(10)->defaultValue(0),
            'slug' => $this->string(100)->defaultValue(''),
            'status' => $this->string(100)->defaultValue(''),
            'type' => $this->string(100)->defaultValue('')
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    public function down()
    {
        $this->dropTable('category');
    }

}
