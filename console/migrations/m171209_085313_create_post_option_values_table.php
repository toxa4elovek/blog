<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_options_value`.
 */
class m171209_085313_create_post_option_values_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_option_values', [
            'post_id' => $this->integer(11),
            'option_id' => $this->integer(11),
            'value' => $this->string(150)
        ]);

        $this->createIndex('idx-model-value', 'post_option_values', 'post_id');
        $this->createIndex('idx-option-value', 'post_option_values', 'option_id');
        $this->addPrimaryKey(
            'fk-model-option-value',
            'post_option_values',
            ['post_id', 'option_id']
        );
        $this->addForeignKey(
            'fk-post-option-value',
            'post_option_values',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post_option_values');
    }
}
