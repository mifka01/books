<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%borrowing}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%user}}`
 */
class m220313_132603_create_borrowing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%borrowing}}', [
            'id' => $this->primaryKey(),
            'book' => $this->integer(11),
            'user' => $this->integer(11),
            'borrow_date' => $this->date(),
            'return_date' => $this->date(),
            'updated_at' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `book`
        $this->createIndex(
            '{{%idx-borrowing-book}}',
            '{{%borrowing}}',
            'book'
        );

        // add foreign key for table `{{%book}}`
        $this->addForeignKey(
            '{{%fk-borrowing-book}}',
            '{{%borrowing}}',
            'book',
            '{{%book}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user`
        $this->createIndex(
            '{{%idx-borrowing-user}}',
            '{{%borrowing}}',
            'user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-borrowing-user}}',
            '{{%borrowing}}',
            'user',
            '{{%user}}',
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
            '{{%fk-borrowing-book}}',
            '{{%borrowing}}'
        );

        // drops index for column `book`
        $this->dropIndex(
            '{{%idx-borrowing-book}}',
            '{{%borrowing}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-borrowing-user}}',
            '{{%borrowing}}'
        );

        // drops index for column `user`
        $this->dropIndex(
            '{{%idx-borrowing-user}}',
            '{{%borrowing}}'
        );

        $this->dropTable('{{%borrowing}}');
    }
}
