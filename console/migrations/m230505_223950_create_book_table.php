<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m230505_223950_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'ebook_isbn' => $this->string(18)->notNull(),
            'paper_isbn' => $this->string(18)->notNull(),
            'title' => $this->string()->notNull(),
            'description' => "LONGTEXT",
            'image_link' => $this->string(),
            'total_pages' => $this->integer(),
            'publish_date' => $this->dateTime()->notNull(),
            'price' => $this->float(2)->notNull(),
            'edition' => $this->string(20),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        $this->addForeignKey(
            'FK_book_created_by',
            '{{%book}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_book_created_by',
            '{{%user}}',
        );

        $this->dropTable('{{%book}}');
    }
}
