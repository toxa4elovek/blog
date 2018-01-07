<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m180106_081322_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'region_id' => $this->integer(11),
            'country_id' => $this->integer(11),
            'is_main' => 'tinyint(1)',
            'latitude' => $this->string(100)->defaultValue(null),
            'longitude' => $this->string(100)->defaultValue(null)
        ]);

        $this->createIndex('idx_city_region_id', 'city', 'region_id');
        $this->createIndex('idx_city_country_id', 'city', 'country_id');
        $this->createIndex('idx_city_name', 'city', 'name');

        $this->addForeignKey('fk_city_country_id', 'city', 'country_id', 'country', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_city_region_id', 'city', 'region_id', 'region', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_city_region_id', 'city');
        $this->dropForeignKey('fk_city_country_id', 'city');

        $this->dropIndex('idx_city_name', 'city');
        $this->dropIndex('idx_city_country_id', 'city');
        $this->dropIndex('idx_city_region_id', 'city');

        $this->dropTable('city');
    }
}
