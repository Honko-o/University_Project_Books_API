<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%post}}`.
 */
class m230520_171637_drop_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey(
            'FK_post_created_by',
            '{{%post}}',
        );

        $this->dropTable('{{%post}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' => 'LONGTEXT',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'FK_post_created_by',
            '{{%post}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
    }
}
