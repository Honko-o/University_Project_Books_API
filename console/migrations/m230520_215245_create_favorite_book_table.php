<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite_book}}`.
 */
class m230520_215245_create_favorite_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorite_book}}', [
            'user_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey(
            'PK_composite_favorite_book',
            '{{%favorite_book}}',
            ['user_id', 'book_id'],
        );

        $this->addForeignKey(
            'FK_favorite_book_user_id',
            '{{%favorite_book}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'FK_favorite_book_book_id',
            '{{%favorite_book}}',
            'book_id',
            '{{%book}}',
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
        $this->dropPrimaryKey(
            'PK_composite_favorite_book',
            '{{%favorite_book}}',
        );

        $this->dropForeignKey(
            'FK_favorite_book_user_id',
            '{{%favorite_book}}'
        );

        $this->dropForeignKey(
            'FK_favorite_book_book_id',
            '{{%favorite_book}}'
        );

        $this->dropTable('{{%favorite_book}}');
    }
}
