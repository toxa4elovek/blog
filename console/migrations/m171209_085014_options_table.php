<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_options`.
 */
class m171209_085014_options_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('options', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'type' => $this->integer(11)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('options');
    }
}
