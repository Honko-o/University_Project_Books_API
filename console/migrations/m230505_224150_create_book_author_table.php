<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_author}}`.
 */
class m230505_224150_create_book_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_author}}', [
            'author_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey(
            'PK_composite_book_author',
            '{{%book_author}}',
            ['author_id', 'book_id'],
        );

        $this->addForeignKey(
            'FK_author_id',
            '{{%book_author}}',
            'author_id',
            '{{%author}}',
            'id',
            'CASCADE',
            'CASCADE',
        );

        $this->addForeignKey(
            'FK2_book_id',
            '{{%book_author}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey(
            'PK_composite_book_author',
            '{{%book_author}}',
        );

        $this->dropForeignKey(
            'FK_author_id',
            '{{%book_author}}',
        );

        $this->dropForeignKey(
            'FK2_book_id',
            '{{%book_author}}',
        );

        $this->dropTable('{{%book_author}}');
    }
}
