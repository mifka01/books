<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220312_160630_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'nationality' => $this->string(50),
            'birthdate' => $this->date(),
            'added_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `added_by`
        $this->createIndex(
            '{{%idx-author-added_by}}',
            '{{%author}}',
            'added_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-author-added_by}}',
            '{{%author}}',
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
            '{{%fk-author-added_by}}',
            '{{%author}}'
        );

        // drops index for column `added_by`
        $this->dropIndex(
            '{{%idx-author-added_by}}',
            '{{%author}}'
        );

        $this->dropTable('{{%author}}');
    }
}
