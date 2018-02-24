<?php

use yii\db\Migration;

/**
 * Handles the creation of table `skill`.
 */
class m180224_083852_create_skill_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('skill', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'status' => 'tinyint(1)'
        ]);

        $this->createIndex('idx_name_skill', 'skill', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('idx_name_skill', 'skill');
        $this->dropTable('skill');
    }
}
