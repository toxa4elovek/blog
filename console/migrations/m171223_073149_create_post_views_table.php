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
            'ip_address' => $this->integer(11)->unsigned(),
        ]);

        $this->addPrimaryKey('pk_post_views', 'post_views', ['post_id', 'ip_address']);

        $this->addForeignKey(
            'fk_post_views',
            'post_views',
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
        $this->dropForeignKey('fk_post_views', 'post_views');
        $this->dropPrimaryKey('pk_post_views', 'post_views');
        $this->dropTable('post_views');
    }
}
