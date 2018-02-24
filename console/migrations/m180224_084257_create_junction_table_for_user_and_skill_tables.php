<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_skill`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `skill`
 */
class m180224_084257_create_junction_table_for_user_and_skill_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_skill', [
            'user_id' => $this->integer(),
            'skill_id' => $this->integer(),
            'PRIMARY KEY(user_id, skill_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_skill-user_id',
            'user_skill',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_skill-user_id',
            'user_skill',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `skill_id`
        $this->createIndex(
            'idx-user_skill-skill_id',
            'user_skill',
            'skill_id'
        );

        // add foreign key for table `skill`
        $this->addForeignKey(
            'fk-user_skill-skill_id',
            'user_skill',
            'skill_id',
            'skill',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_skill-user_id',
            'user_skill'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_skill-user_id',
            'user_skill'
        );

        // drops foreign key for table `skill`
        $this->dropForeignKey(
            'fk-user_skill-skill_id',
            'user_skill'
        );

        // drops index for column `skill_id`
        $this->dropIndex(
            'idx-user_skill-skill_id',
            'user_skill'
        );

        $this->dropTable('user_skill');
    }
}
