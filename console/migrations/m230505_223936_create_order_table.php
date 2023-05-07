<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m230505_223936_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'order_date' => $this->dateTime()->notNull(),
            'status' => $this->string(10)->notNull(),
            // Sell / Buy To handle Selling and Buying
            'order_type' => $this->string(5)->notNull(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'FK_order_user_created_by',
            '{{%order}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            "index_user_id",
            '{{%order}}',
            'created_by',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_user_id',
            '{{%order}}'
        );
        $this->dropIndex(
            'index_user_id',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
