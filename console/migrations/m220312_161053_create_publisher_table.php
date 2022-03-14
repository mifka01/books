<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publisher}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220312_161053_create_publisher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%publisher}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'nationality' => $this->string(2),
            'added_by' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `added_by`
        $this->createIndex(
            '{{%idx-publisher-added_by}}',
            '{{%publisher}}',
            'added_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-publisher-added_by}}',
            '{{%publisher}}',
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
            '{{%fk-publisher-added_by}}',
            '{{%publisher}}'
        );

        // drops index for column `added_by`
        $this->dropIndex(
            '{{%idx-publisher_added_by}}',
            '{{%publisher}}'
        );

        $this->dropTable('{{%publisher}}');
    }
}
