<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_favourites`.
 */
class m171223_074314_create_post_favourites_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_favourites', [
            'post_id' => $this->integer(11),
            'user_id' => $this->integer(11)
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addPrimaryKey('pk_post_favourites', 'post_favourites', ['post_id', 'user_id']);
        $this->addForeignKey(
            'fk_post_favourites',
            'post_favourites',
            'post_id',
            'post',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_favourites',
            'post_favourites',
            'user_id',
            'user',
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
        $this->dropForeignKey('fk_user_favourites', 'post_favourites');
        $this->dropForeignKey('fk_post_favourites', 'post_favourites');
        $this->dropPrimaryKey('pk_post_favourites', 'post_favourites');
        $this->dropTable('post_favourites');
    }
}
