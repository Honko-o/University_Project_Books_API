<?php

namespace backend\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $ebook_isbn
 * @property string $paper_isbn
 * @property string $title
 * @property string|null $description
 * @property string|null $image_link
 * @property int|null $total_pages
 * @property string $publish_date
 * @property float $price
 * @property string|null $edition
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property Author[] $authors
 * @property BookAuthor[] $bookAuthors
 * @property BookCategories[] $bookCategories
 * @property Categories[] $categories
 * @property User $createdBy
 * @property OrderItems[] $orderItems
 * @property Order[] $orders
 * @property Order[] $orders0
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ebook_isbn', 'paper_isbn', 'title', 'publish_date', 'price'], 'required'],
            [['description'], 'string'],
            [['total_pages'], 'integer'],
            [['publish_date'], 'safe'],
            [['price'], 'number'],
            [['ebook_isbn', 'paper_isbn'], 'string', 'max' => 18],
            [['title', 'image_link'], 'string', 'max' => 255],
            [['edition'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ebook_isbn' => 'Ebook Isbn',
            'paper_isbn' => 'Paper Isbn',
            'title' => 'Title',
            'description' => 'Description',
            'image_link' => 'Image Link',
            'total_pages' => 'Total Pages',
            'publish_date' => 'Publish Date',
            'price' => 'Price',
            'edition' => 'Edition',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $categories = Yii::$app->request->getBodyParam('categories', []);
        $categoryModels = Categories::findAll($categories);

        if ($this->isNewRecord) {
            $this->link('categories', $categoryModels);
        } else {
            $this->unlinkAll('categories', true);
            foreach ($categoryModels as $categoryModel) {
                $this->link('categories', $categoryModel);
            }
        }
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\AuthorQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])->viaTable('book_author', ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookAuthors]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\BookAuthorQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[BookCategories]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\BookCategoriesQuery
     */
    public function getBookCategories()
    {
        return $this->hasMany(BookCategories::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\CategoriesQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::class, ['id' => 'category_id'])->viaTable('book_categories', ['book_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\OrderItemsQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\OrderQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id' => 'order_id'])->viaTable('order_items', ['book_id' => 'id']);
    }

    /**
     * Gets query for [[Orders0]].
     *
     * @return \yii\db\ActiveQuery|\backend\models\query\OrderQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Order::class, ['id' => 'order_id'])->viaTable('order_items', ['book_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\BookQuery(get_called_class());
    }
}
