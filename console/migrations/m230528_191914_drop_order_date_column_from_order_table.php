<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%order}}`.
 */
class m230528_191914_drop_order_date_column_from_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn(
            '{{%order}}',
            'order_date',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(
            '{{%order}}',
            'order_date',
            $this->dateTime()->notNull(),
        );
    }
}
