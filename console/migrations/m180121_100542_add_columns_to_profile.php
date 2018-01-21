<?php

use yii\db\Migration;

/**
 * Class m180121_100542_add_column_last_name_to_profile
 */
class m180121_100542_add_columns_to_profile extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'last_name', $this->string(100));
        $this->addColumn('profile', 'gender', 'tinyint(1)');
        $this->alterColumn('profile', 'location', $this->integer(11));
        $this->renameColumn('profile', 'location', 'city_id');


        $this->createIndex('idx_profile_city_id', 'profile', 'city_id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex('idx_profile_city_id', 'profile');

        $this->renameColumn('profile', 'city_id', 'location');
        $this->alterColumn('profile', 'location', $this->string(255));

        $this->dropColumn('profile', 'last_name');
        $this->dropColumn('profile', 'gender');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180121_100542_add_column_last_name_to_profile cannot be reverted.\n";

        return false;
    }
    */
}
