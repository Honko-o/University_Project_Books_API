<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%first_last_and_add_name_to_author}}`.
 */
class m230512_004913_drop_first_last_and_add_name_to_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%author}}', 'first_name');
        $this->dropColumn('{{%author}}', 'last_name');
        $this->addColumn('{{%author}}', 'name', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%author}}', 'first_name', $this->string(50)->notNull());
        $this->dropColumn('{{%author}}', 'last_name', $this->string(50)->notNull());
        $this->dropColumn('{{%author}}', 'name');
    }
}
