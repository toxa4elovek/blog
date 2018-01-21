<?php

use yii\db\Migration;

/**
 * Class m180121_104238_add_foreign_key_fk_profile_city_id
 */
class m180121_104238_add_foreign_key_fk_profile_city_id extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_profile_city_id', 'profile', 'city_id', 'city', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_profile_city_id', 'profile');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180121_104238_add_foreign_key_fk_profile_city_id cannot be reverted.\n";

        return false;
    }
    */
}
