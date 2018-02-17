<?php

use yii\db\Migration;

/**
 * Handles the creation of table `education`.
 */
class m180203_114935_create_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('education', [
            'id' => $this->primaryKey(),
            'place_id' => $this->integer(11),
            'type' => 'tinyint(1)',
            'user_id' => $this->integer(11),
            'begin_at' => $this->date(),
            'ending_at' => $this->date()
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('idx_education_place_id', 'education', ['place_id', 'type']);
        $this->createIndex('idx_education_user_id', 'education', 'user_id');

        $this->addForeignKey(
            'fk_education_place_id',
            'education',
            ['place_id', 'type'],
            'education_place',
            ['id', 'type'],
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_education_user_id',
            'education',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_education_user_id', 'education');
        $this->dropForeignKey('fk_education_place_id', 'education');

        $this->dropIndex('idx_education_user_id', 'education');
        $this->dropIndex('idx_education_place_id', 'education');

        $this->dropTable('education');
    }
}
