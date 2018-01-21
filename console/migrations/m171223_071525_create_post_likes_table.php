<?php

use yii\db\Migration;

/**
 * Handles the creation of table `likes`.
 */
class m171223_071525_create_post_likes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_likes', [
            'post_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'like' => 'tinyint(1)'
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addPrimaryKey('pk_post_id_user_id', 'post_likes', ['post_id', 'user_id']);

        $this->createIndex('idx_post_id_likes', 'post_likes', 'post_id');
        $this->createIndex('idx_user_id_likes', 'post_likes', 'user_id');

        $this->addForeignKey(
            'fk_user_like',
            'post_likes',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'CASCADE'
            );

        $this->addForeignKey(
            'fk_post_like',
            'post_likes',
            'post_id',
            'post',
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

        $this->dropForeignKey('fk_post_like', 'post_likes');
        $this->dropForeignKey('fk_user_like', 'post_likes');
        $this->dropIndex('idx_user_id_likes', 'post_likes');
        $this->dropIndex('idx_post_id_likes', 'post_likes');
        $this->dropPrimaryKey('pk_post_id_user_id', 'post_likes');

        $this->dropTable('post_likes');
    }
}
