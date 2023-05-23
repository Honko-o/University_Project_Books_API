<?php

namespace backend\models;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $category_name
 *
 * @property BookCategories[] $bookCategories
 * @property Book[] $books
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * Gets query for [[BookCategories]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\BookCategoriesQuery
     */
    public function getBookCategories()
    {
        return $this->hasMany(BookCategories::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\BookQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])->viaTable('book_categories', ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\CategoriesQuery(get_called_class());
    }
}
