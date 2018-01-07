<?php

use yii\db\Migration;

/**
 * Handles the creation of table `region`.
 */
class m180106_080849_create_region_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'country_id' => $this->integer(11),
        ]);

        $this->createIndex('idx_region_country_id', 'region', 'country_id');
        $this->createIndex('idx_region_name', 'region', 'name');

        $this->addForeignKey('fk_region_country_id', 'region', 'country_id', 'country', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_region_country_id', 'region');

        $this->dropIndex('idx_region_name', 'region');
        $this->dropIndex('idx_region_country_id', 'region');

        $this->dropTable('region');
    }
}
