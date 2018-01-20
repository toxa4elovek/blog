<?php

use yii\db\Migration;

/**
 * Class m171224_183443_modify_post_table
 */
class m171224_183443_modify_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createIndex('idx_post_slug', 'post', 'slug');
        $this->alterColumn('post', 'status', 'tinyint(1)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->alterColumn('post', 'status', $this->string(100));
        $this->dropIndex('idx_post_slug', 'post');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171224_183443_modify_post_table cannot be reverted.\n";

        return false;
    }
    */
}
