<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hasGenre}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%genre}}`
 */
class m220312_181523_create_hasGenre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hasGenre}}', [
            'id' => $this->primaryKey(),
            'book' => $this->integer(11)->notNull(),
            'genre' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `book`
        $this->createIndex(
            '{{%idx-hasGenre-book}}',
            '{{%hasGenre}}',
            'book'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-hasGenre-book}}',
            '{{%hasGenre}}',
            'book',
            '{{%book}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre`
        $this->createIndex(
            '{{%idx-hasGenre-genre}}',
            '{{%hasGenre}}',
            'genre'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-hasGenre-genre}}',
            '{{%hasGenre}}',
            'genre',
            '{{%genre}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%book}}`
        $this->dropForeignKey(
            '{{%fk-hasGenre-book}}',
            '{{%hasGenre}}'
        );

        // drops index for column `book`
        $this->dropIndex(
            '{{%idx-hasGenre-book}}',
            '{{%hasGenre}}'
        );

        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-hasGenre-genre}}',
            '{{%hasGenre}}'
        );

        // drops index for column `genre`
        $this->dropIndex(
            '{{%idx-hasGenre-genre}}',
            '{{%hasGenre}}'
        );

        $this->dropTable('{{%hasGenre}}');
    }
}
