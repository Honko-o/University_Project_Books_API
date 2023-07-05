<?php

use yii\db\Migration;

/**
 * Class m230613_143515_alter_timestamp_fields_from_unix_numbers_to_timestamp
 */
class m230613_143515_alter_timestamp_fields_from_unix_numbers_to_timestamp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(
            '{{%user}}',
            'created_at',
            $this->timestamp()->notNull(),
        );

        $this->alterColumn(
            '{{%user}}',
            'updated_at',
            $this->timestamp()->notNull(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn(
            '{{%user}}',
            'created_at',
            $this->integer()->notNull(),
        );

        $this->alterColumn(
            '{{%user}}',
            'updated_at',
            $this->integer()->notNull(),
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230613_143515_alter_timestamp_fields_from_unix_numbers_to_timestamp cannot be reverted.\n";

        return false;
    }
    */
}
