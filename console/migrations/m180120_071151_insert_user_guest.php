<?php

use yii\db\Migration;

/**
 * Class m180120_071151_insert_user_guest
 */
class m180120_071151_insert_user_guest extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('user',
            [
                'username' =>  'guest',
                'email' => 'guest@example.com',
                'password_hash' => '$2y$10$9e/Rx6ve6qAnxmmfiQIWcOAVosnrjofTA322r8OT.78fRGhn1kScK',
                'auth_key' => 'VabvreWsywYbdiMnrp1YG-Dlfwc6NqS2',
                'confirmed_at' => time(),
                'created_at' => time(),
                'updated_at' => time(),
                'flags' => 0,
            ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'guest']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180120_071151_insert_user_guest cannot be reverted.\n";

        return false;
    }
    */
}
