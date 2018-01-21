<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m180106_080614_create_country_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'code' => $this->string(20)
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('country_name', 'country', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('country_name', 'country');
        $this->dropTable('country');
    }
}
