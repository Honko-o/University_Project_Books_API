<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%order_items}}`.
 */
class m230529_104540_drop_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%order_items}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%order_items}}', [
            'order_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->defaultValue(0),
            'total_price' => $this->integer()->defaultValue(0),
        ]);
    }
}
