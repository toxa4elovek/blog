<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation of table `question`.
 */
class m180108_091120_create_question_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'title' => $this->string(100),
            'slug' => $this->string(100),
            'text' => $this->text(),
            'status' => 'tinyint(1)',
            'created_at' => $this->dateTime()->defaultValue(New Expression('NOW()')),
            'updated_at' => $this->dateTime()->defaultValue(New Expression('NOW()'))
        ]);

        $this->createIndex('idx_question_user_id', 'question', 'user_id');

        $this->addForeignKey(
            'idx-user-question',
            'question',
            'user_id',
            'user',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('idx-user-question', 'question');

        $this->dropIndex('idx_question_user_id', 'question');

        $this->dropTable('question');
    }
}
