<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%order_type_from_order}}`.
 */
class m230606_095920_drop_order_type_from_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn(
            '{{%order}}',
            'order_type',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(
            '{{%order}}',
            'order_type',
             $this->string(5)->notNull(),
        );
    }
}
