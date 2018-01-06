<?php

use yii\db\Migration;

/**
 * Handles the creation of table `university`.
 */
class m180106_122029_create_university_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('university', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'city_id' => $this->integer(11)
        ]);

        $this->createIndex('idx_university_name', 'university', 'name');
        $this->createIndex('idx_university_city_id', 'university', 'city_id');

        $this->addForeignKey('fk_university_city_id', 'university', 'city_id', 'city', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_university_city_id', 'university');

        $this->dropIndex('idx_university_city_id', 'university');
        $this->dropIndex('idx_university_name', 'university');

        $this->dropTable('university');
    }
}
