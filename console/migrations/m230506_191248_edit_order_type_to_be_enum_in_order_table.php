<?php

use yii\db\Migration;

/**
 * Class m230506_191248_edit_order_type_to_be_enum_in_order_table
 */
class m230506_191248_edit_order_type_to_be_enum_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(
            '{{%order}}',
            'order_type',
            "ENUM('Buy', 'Sell')",
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230506_191248_edit_order_type_to_be_enum_in_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230506_191248_edit_order_type_to_be_enum_in_order_table cannot be reverted.\n";

        return false;
    }
    */
}
