<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post_options`.
 */
class m171209_085014_post_options_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post_options', [
            'post_id' => $this->integer()->notNull()->append('PRIMARY KEY'),
            'views' => $this->integer(11)->defaultValue(0),
            'comment_count' => $this->integer(11)->defaultValue(0),
            'likes' => $this->integer(11)->defaultValue(0),
            'dislikes' => $this->integer(11)->defaultValue(0),
            'favorites_count' => $this->integer(11)->defaultValue(0),
        ]);

        $this->addForeignKey(
            'idx-post-options',
            'post_options',
            'post_id',
            'post',
            'id',
            'CASCADE',
            'RESTRICT'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('idx-post-options', 'post_options');
        $this->dropTable('post_options');
    }
}
