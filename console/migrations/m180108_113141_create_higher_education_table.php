<?php

use yii\db\Migration;

/**
 * Handles the creation of table `higher_education`.
 */
class m180108_113141_create_higher_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('higher_education', [
            'id' => $this->primaryKey(),
            'place_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'begin_at' => $this->date(),
            'ending_at' => $this->date()
        ]);

        $this->createIndex('idx_higher_education_place_id', 'higher_education', 'place_id');
        $this->createIndex('idx_higher_education_user_id', 'higher_education', 'user_id');

        $this->addForeignKey(
            'fk_higher_education_place_id',
            'higher_education',
            'place_id',
            'university',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_higher_education_user_id',
            'higher_education',
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
        $this->dropForeignKey('fk_higher_education_user_id', 'higher_education');
        $this->dropForeignKey('fk_higher_education_place_id', 'higher_education');

        $this->dropIndex('idx_higher_education_user_id', 'higher_education');
        $this->dropIndex('idx_higher_education_place_id', 'higher_education');

        $this->dropTable('higher_education');
    }
}
