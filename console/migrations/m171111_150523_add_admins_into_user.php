<?php

use yii\db\Migration;

/**
 * Class m171111_150523_add_admins_into_user
 */
class m171111_150523_add_admins_into_user extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->insert('user',
            [
                'id' => 1,
                'username' =>  'toxa4elovek',
                'email' => 'toxa4elovek@gmail.com',
                'password_hash' => '$2y$10$9e/Rx6ve6qAnxmmfiQIWcOAVosnrjofTA322r8OT.78fRGhn1kScK',
                'auth_key' => 'VabvreWsywYbdiMnrp1YG-Dlfwc6NqS2',
                'confirmed_at' => time(),
                'created_at' => time(),
                'updated_at' => time(),
                'flags' => 0,
            ]);

        $this->insert('auth_item',
            [
                'name' => 'admin',
                'type' => 1,
            ]);


        $this->insert('auth_assignment',
            [
                'item_name' => 'admin',
                'user_id' => 1,
            ]);

        $this->insert('user',
            [
                'id' => 2,
                'username' =>  'garry-krut',
                'email' => 'i.slizh.garik@gmail.com',
                'password_hash' => '$2y$10$4m6aQ0ws/X4DTiD7Gdgj8u7vU9vj4CzIyhi1nPO2qdZwkH6CDIl4K',
                'auth_key' => '5cOyb7mVHUPD01CeclKcEgObxXfa-2ib',
                'confirmed_at' => time(),
                'created_at' => time(),
                'updated_at' => time(),
                'flags' => 0,
            ]);


        $this->insert('auth_assignment',
            [
                'item_name' => 'admin',
                'user_id' => 2,
            ]);
    }

    public function down()
    {
        //$this->delete('user', ['id' => [1, 2]]);
        return false;
    }

}
