<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment_likes`.
 */
class m171227_182557_create_comment_likes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment_likes', [
            'comment_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'like' => 'tinyint(1)'
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addPrimaryKey('pk_comment_id_user_id', 'comment_likes', ['comment_id', 'user_id']);

        $this->createIndex('idx_comment_id_likes', 'comment_likes', 'comment_id');
        $this->createIndex('idx_user_id_comment_likes', 'comment_likes', 'user_id');

        $this->addForeignKey(
            'fk_user_comment_like',
            'comment_likes',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_comment_like',
            'comment_likes',
            'comment_id',
            'post_comments',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_comment_like', 'comment_likes');
        $this->dropForeignKey('fk_user_comment_like', 'comment_likes');
        $this->dropIndex('idx_user_id_comment_likes', 'comment_likes');
        $this->dropIndex('idx_comment_id_likes', 'comment_likes');
        $this->dropPrimaryKey('pk_comment_id_user_id', 'comment_likes');
        $this->dropTable('comment_likes');
    }
}
