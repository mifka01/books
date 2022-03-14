<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genre}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220312_161325_create_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genre}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'added_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `added_by`
        $this->createIndex(
            '{{%idx-genre-added_by}}',
            '{{%genre}}',
            'added_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-genre-added_by}}',
            '{{%genre}}',
            'added_by',
            '{{%user}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-genre-added_by}}',
            '{{%genre}}'
        );

        // drops index for column `added_by`
        $this->dropIndex(
            '{{%idx-genre-added_by}}',
            '{{%genre}}'
        );

        $this->dropTable('{{%genre}}');
    }
}
