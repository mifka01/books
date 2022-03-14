<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m220312_172433_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
          'id' => $this->primaryKey(),
          'isbn' => $this->string(17)->notNull(),
          'title' => $this->string(255)->notNull(),
          'description' =>$this->text(),
          'pages' => $this->integer()->notNull(),
          'show' => $this->boolean()->defaultValue(true),
          'available' => $this->boolean()->defaultValue(true),
          'author' => $this->integer(11),
          'illustrator' => $this->integer(11),
          'publisher' => $this->integer(11),
          'added_by' => $this->integer(11),
          'publishion_date' => $this->integer(4),
          'updated_at' => $this->integer(11),
          'created_at' => $this->integer(11),
        ]);


        $this->createIndex(
          '{{%idx-book-author}}',
          '{{%book}}',
          'author',
        );

        $this->addForeignKey(
            '{{%fk-book-author}}',
            '{{%book}}',
            'author',
            '{{%author}}',
            'id',
            'SET NULL'
        );

        $this->createIndex(
          '{{%idx-book-illustrator}}',
          '{{%book}}',
          'illustrator',
        );

        $this->addForeignKey(
            '{{%fk-book-illustrator}}',
            '{{%book}}',
            'illustrator',
            '{{%illustrator}}',
            'id',
            'SET NULL',
        );

        $this->createIndex(
          '{{%idx-book-publisher}}',
          '{{%book}}',
          'publisher',
        );


        $this->addForeignKey(
            '{{%fk-book-publisher}}',
            '{{%book}}',
            'publisher',
            '{{%publisher}}',
            'id',
            'SET NULL'
        );

        $this->createIndex(
          '{{%idx-book-added_by}}',
          '{{%book}}',
          'added_by',
        );


        $this->addForeignKey(
            '{{%fk-book-added_by}}',
            '{{%book}}',
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
         $this->dropForeignKey(
            '{{%fk-book-author}}',
            '{{%book}}'
         );

         $this->dropIndex(
            '{{%idx-book-author}}',
            '{{%book}}'
        );

         $this->dropForeignKey(
            '{{%fk-book-illustator}}',
            '{{%book}}'
         );

         $this->dropIndex(
            '{{%idx-book-illustrator}}',
            '{{%book}}'
        );

         $this->dropForeignKey(
            '{{%fk-book-added_by}}',
            '{{%book}}'
         );

         $this->dropIndex(
            '{{%idx-book-added_by}}',
            '{{%book}}'
         );

         $this->dropForeignKey(
            '{{%fk-book-publisher}}',
            '{{%book}}'
         );
         $this->dropIndex(
            '{{%idx-book-publisher}}',
            '{{%book}}'
        );

        $this->dropTable('{{%book}}');
    }
}
