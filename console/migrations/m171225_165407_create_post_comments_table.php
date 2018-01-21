<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_comment`.
 */
class m171225_165407_create_post_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'post_id' => $this->integer(11),
            'parent_id' => $this->integer(11)->defaultValue(0),
            'text' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('idx_user_id_comment', 'post_comments', 'user_id');
        $this->createIndex('idx_post_id_comment', 'post_comments', 'post_id');
        $this->createIndex('idx_parent_id_comment', 'post_comments', 'parent_id');

        $this->addForeignKey('fk_user_comments', 'post_comments', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_post_comments', 'post_comments', 'post_id', 'post', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_post_comments', 'post_comments');
        $this->dropForeignKey('fk_user_comments', 'post_comments');

        $this->dropIndex('idx_parent_id_comment', 'post_comments');
        $this->dropIndex('idx_post_id_comment', 'post_comments');
        $this->dropIndex('idx_user_id_comment', 'post_comments');

        $this->dropTable('post_comments');
    }
}
