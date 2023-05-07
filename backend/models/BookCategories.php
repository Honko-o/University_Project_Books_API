<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book_categories".
 *
 * @property int $book_id
 * @property int $category_id
 *
 * @property Book $book
 * @property Categories $category
 */
class BookCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'category_id'], 'required'],
            [['book_id', 'category_id'], 'integer'],
            [['book_id', 'category_id'], 'unique', 'targetAttribute' => ['book_id', 'category_id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'category_id' => 'Category ID',
        ];
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CategoriesQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\BookCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\BookCategoriesQuery(get_called_class());
    }
}
