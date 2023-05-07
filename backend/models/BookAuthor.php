<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book_author".
 *
 * @property int $author_id
 * @property int $book_id
 *
 * @property Author $author
 * @property Book $book
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'book_id'], 'required'],
            [['author_id', 'book_id'], 'integer'],
            [['author_id', 'book_id'], 'unique', 'targetAttribute' => ['author_id', 'book_id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'author_id' => 'Author ID',
            'book_id' => 'Book ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\AuthorQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\BookQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\BookAuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\BookAuthorQuery(get_called_class());
    }
}
