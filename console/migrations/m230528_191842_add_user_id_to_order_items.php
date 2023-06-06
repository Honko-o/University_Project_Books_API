<?php

use yii\db\Migration;

/**
 * Class m230528_191842_add_user_id_to_order_items
 */
class m230528_191842_add_user_id_to_order_items extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            '{{%order_items}}',
            'user_id',
            $this->integer()->notNull(),
        );

        $this->addForeignKey(
            'FK_order_items_user_id',
            '{{%order_items}}',
            'user_id',
            '{{%user}}',
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
        $this->dropColumn(
            '{{%order_items}}',
            'user_id',
        );

        $this->dropForeignKey(
            'FK_order_items_user_id',
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
        echo "m230528_191842_add_user_id_to_order_items cannot be reverted.\n";

        return false;
    }
    */
}
