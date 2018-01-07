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
        $this->addColumn('post', 'views', $this->integer(11)->unsigned()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropIndex('idx_post_slug', 'post');
        $this->dropColumn('post', 'views');
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
