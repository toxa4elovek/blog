<?php

use yii\db\Migration;

/**
 * Handles the creation of table `avatar`.
 */
class m180325_110131_create_avatar_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('avatar', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'img' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
         ]);

        $this->createIndex('idx_user_id_avatar', 'avatar', 'user_id');
        $this->addForeignKey(
            'fk_user_id_avatar',
            'avatar',
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
        $this->dropForeignKey('fk_user_id_avatar', 'avatar');
        $this->dropIndex('idx_user_id_avatar', 'avatar');

        $this->dropTable('avatar');
    }
}
