<?php

use yii\db\Migration;

/**
 * Handles the creation of table `education_place`.
 */
class m180128_123346_create_education_place_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('education_place', [
            'id' => $this->integer(11),
            'name' => $this->string(200),
            'city_id' => $this->integer(11),
            'type' => 'tinyint(1)',

        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->addPrimaryKey('pk_education_place', 'education_place', ['id', 'type']);
        $this->createIndex('idx_education_place_name', 'education_place', 'name');
        $this->createIndex('idx_education_place_city_id', 'education_place', 'city_id');

        $this->addForeignKey('fk_education_place_city_id', 'education_place', 'city_id', 'city', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_education_place_city_id', 'education_place');

        $this->dropIndex('idx_education_place_city_id', 'education_place');
        $this->dropIndex('idx_education_place_name', 'education_place');

        $this->dropTable('education_place');
    }
}
