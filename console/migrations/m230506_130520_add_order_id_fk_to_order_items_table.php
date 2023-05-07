<?php

use yii\db\Migration;

/**
 * Class m230506_130520_add_order_id_fk_to_order_items_table
 */
class m230506_130520_add_order_id_fk_to_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'FK2_order_id',
            '{{%order_items}}',
            'order_id',
            '{{%order}}',
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
        $this->dropForeignKey(
            'FK2_order_id',
            '{{%order_items}}',
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230506_130520_add_order_id_fk_to_order_items_table cannot be reverted.\n";

        return false;
    }
    */
}
