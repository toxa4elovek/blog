<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_views`.
 */
class m171223_073149_create_post_views_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_views', [
            'post_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'ip_address' => $this->integer(11)->unsigned(),
            'count' => $this->integer(11)->defaultValue(1)
        ]);

        $this->addPrimaryKey('pk_post_views', 'post_views', ['post_id', 'ip_address', 'user_id']);

        $this->addForeignKey(
            'fk_post_views',
            'post_views',
            'post_id',
            'post',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_post_views',
            'post_views',
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
        $this->dropForeignKey('fk_user_post_views', 'post_views');
        $this->dropForeignKey('fk_post_views', 'post_views');
        $this->dropPrimaryKey('pk_post_views', 'post_views');
        $this->dropTable('post_views');
    }
}
