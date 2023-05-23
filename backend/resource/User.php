<?php

    namespace backend\resource;

    class User extends \common\models\User
    {
        public function fields()
        {
            return ['username', 'email', 'status'];
        }

        public function extraFields()
        {
            return ['updated_at'];
        }

        /**
         * Gets query for [[Books]].
         *
         * @return \yii\db\ActiveQuery|\backend\models\query\BookQuery
         */
        public function getBooks()
        {
            return $this->hasMany(Book::class, ['created_by' => 'id']);
        }

        /**
         * Gets query for [[FavoriteBooksThroughJoinTable]].
         *
         * @return \yii\db\ActiveQuery|\backend\models\query\BookQuery
         */
        public function getFavoriteBooksThroughJoinTable()
        {
            return $this->hasMany(Book::class, ['id' => 'book_id'])->viaTable('favorite_book', ['user_id' => 'id']);
        }

        /**
         * Gets query for [[FavoriteBooks]].
         *
         * @return \yii\db\ActiveQuery|\backend\models\query\FavoriteBookQuery
         */
        public function getFavoriteBooks()
        {
            return $this->hasMany(FavoriteBook::class, ['user_id' => 'id']);
        }

        /**
         * Gets query for [[Orders]].
         *
         * @return \yii\db\ActiveQuery|\backend\models\query\OrderQuery
         */
        public function getOrders()
        {
            return $this->hasMany(Order::class, ['created_by' => 'id']);
        }

        /**
         * {@inheritdoc}
         * @return \backend\models\query\UserQuery the active query used by this AR class.
         */
        public static function find()
        {
            return new \backend\models\query\UserQuery(get_called_class());
        }
    }