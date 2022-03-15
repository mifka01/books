<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%illustrator}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220312_161159_create_illustrator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%illustrator}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'nationality' => $this->string(2),
            'birthdate' => $this->date(),
            'added_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `added_by`
        $this->createIndex(
            '{{%idx-illustrator-added_by}}',
            '{{%illustrator}}',
            'added_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-illustrator-added_by}}',
            '{{%illustrator}}',
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
            '{{%fk-illustrator-added_by}}',
            '{{%illustrator}}'
        );

        // drops index for column `added_by`
        $this->dropIndex(
            '{{%idx-illustrator-added_by}}',
            '{{%illustrator}}'
        );

        $this->dropTable('{{%illustrator}}');
    }
}
