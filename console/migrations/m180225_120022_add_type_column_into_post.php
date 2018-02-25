<?php

use yii\db\Migration;

/**
 * Class m180225_120022_add_type_column_into_post
 */
class m180225_120022_add_type_column_into_post extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('post', 'type', 'tinyint(1)');
    }

    public function down()
    {
        $this->dropColumn('post', 'type');
    }

}
