<?php

use yii\db\Migration;

/**
 * Class m230505_224117_create_book_categories
 */
class m230505_224117_create_book_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_categories}}', [
            'book_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey(
            'PK_composite_book_categories',
            '{{%book_categories}}',
            ['book_id', 'category_id'],
        );

        $this->addForeignKey(
            'FK_category_id',
            '{{%book_categories}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_book_id',
            '{{%book_categories}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey(
            'PK_composite_book_categories',
            '{{%book_categories}}',
        );
        $this->dropForeignKey(
            'FK_category_id',
            '{{%book_categories}}'
        );
        $this->dropForeignKey(
            'FK_book_id',
            '{{%book_categories}}'
        );

        $this->dropTable('{{%book_categories}}');
    }
}
