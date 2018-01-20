<?php

use yii\db\Migration;

/**
 * Handles the creation of table `education`.
 */
class m180108_111604_create_middle_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('middle_education', [
            'id' => $this->primaryKey(),
            'place_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'begin_at' => $this->date(),
            'ending_at' => $this->date()
        ]);

        $this->createIndex('idx_middle_education_place_id', 'middle_education', 'place_id');
        $this->createIndex('idx_middle_education_user_id', 'middle_education', 'user_id');

        $this->addForeignKey(
            'fk_middle_education_place_id',
            'middle_education',
            'place_id',
            'school',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_middle_education_user_id',
            'middle_education',
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
        $this->dropForeignKey('fk_middle_education_user_id', 'middle_education');
        $this->dropForeignKey('fk_middle_education_place_id', 'middle_education');

        $this->dropIndex('idx_middle_education_user_id', 'middle_education');
        $this->dropIndex('idx_middle_education_place_id', 'middle_education');

        $this->dropTable('middle_education');
    }
}
