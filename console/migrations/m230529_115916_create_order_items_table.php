<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m230529_115916_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'order_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->defaultValue(0),
            'total_price' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'PK_composite_order_items',
            '{{%order_items}}',
            ['order_id', 'book_id'],
        );

        $this->addForeignKey(
            'FK_order_id',
            '{{%order_items}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK3_book_id',
            '{{%order_items}}',
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
        $this->dropForeignKey(
            'FK_order_id',
            '{{%order_items}}',
        );
        $this->dropForeignKey(
            'FK3_book_id',
            '{{%order_items}}',
        );
        $this->dropPrimaryKey(
            'PK_composite_order_items',
            '{{%order_items}}'
        );
        $this->dropTable('{{%order_items}}');
    }
}
