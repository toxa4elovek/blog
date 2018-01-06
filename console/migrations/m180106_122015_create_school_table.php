<?php

use yii\db\Migration;

/**
 * Handles the creation of table `school`.
 */
class m180106_122015_create_school_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('school', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'city_id' => $this->integer(11),
        ]);

        $this->createIndex('idx_school_name', 'school', 'name');
        $this->createIndex('idx_school_city_id', 'school', 'city_id');

        $this->addForeignKey('fk_school_city_id', 'school', 'city_id', 'city', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_school_city_id', 'school');

        $this->dropIndex('idx_school_city_id', 'school');
        $this->dropIndex('idx_school_name', 'school');

        $this->dropTable('school');
    }
}
