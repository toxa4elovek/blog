<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Class m171112_153205_create_table_post
 */
class m171112_153205_create_table_post extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->defaultValue(1),
            'title' => $this->string(100)->defaultValue(''),
            'slug' => $this->string(100)->defaultValue(''),
            'status' => $this->string(100)->defaultValue(''),
            'img' => $this->string(100)->defaultValue(''),
            'text' => $this->text()->defaultValue(''),
            'short_text' => $this->string(255)->defaultValue(''),
            'created_at' => $this->dateTime()->defaultValue(New Expression('NOW()')),
            'updated_at' => $this->dateTime()->defaultValue(New Expression('NOW()'))
        ]);

        $this->createIndex('idx-post-user_id', 'post', 'user_id');

        $this->addForeignKey(
            'idx-user-posts',
            'post',
            'user_id',
            'user',
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('idx-user-posts', 'post');
        $this->dropIndex('idx-post-user_id', 'post');
        $this->dropTable('post');
    }
}
