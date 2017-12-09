<?php

use yii\db\Migration;

/**
 * Class m171112_153205_create_table_post
 */
class m171112_153205_create_table_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'category_id' => $this->integer(11),
            'title' => $this->string(100)->defaultValue(''),
            'slug' => $this->string(100)->defaultValue(''),
            'status' => $this->string(100)->defaultValue(''),
            'img' => $this->string(100)->defaultValue(''),
            'text' => $this->text()->defaultValue(''),
            'short_text' => $this->string(255)->defaultValue(''),
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
