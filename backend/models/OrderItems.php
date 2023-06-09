<?php

    namespace backend\models;

    use Yii;

    /**
     * This is the model class for table "order_items".
     *
     * @property int $id
     * @property int $order_id
     * @property int $book_id
     * @property int|null $quantity
     * @property int|null $total_price
     *
     * @property Book $book
     * @property Order $order
     */
    class OrderItems extends \yii\db\ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'order_items';
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['order_id', 'book_id'], 'required'],
                [['order_id', 'book_id', 'quantity', 'total_price'], 'integer'],
                [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
                [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'order_id' => 'Order ID',
                'book_id' => 'Book ID',
                'quantity' => 'Quantity',
                'total_price' => 'Total Price',
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
         * Gets query for [[Order]].
         *
         * @return \yii\db\ActiveQuery|\backend\models\query\OrderQuery
         */
        public function getOrder()
        {
            return $this->hasOne(Order::class, ['id' => 'order_id']);
        }

        /**
         * {@inheritdoc}
         * @return \backend\models\query\OrderItemsQuery the active query used by this AR class.
         */
        public static function find()
        {
            return new \backend\models\query\OrderItemsQuery(get_called_class());
        }
    }
