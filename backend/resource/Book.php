<?php

    namespace backend\resource;

    use yii\behaviors\BlameableBehavior;
    use yii\behaviors\TimestampBehavior;

    class Book extends \backend\models\Book
    {
        public function behaviors()
        {
            return [
                TimestampBehavior::class,
                [
                    'class' => BlameableBehavior::class,
                    'updatedByAttribute' => false,
                ]
            ];
        }

        public function fields()
        {
            return array_merge(parent::fields(), ['categories', 'authors']);
        }

        /**
         * @param $data bodyparams in Post Request
         * @return array Array contains book_id => id
         *
         */
        public function createBook($data) {
            if (!$this->load($data, '') && !$this->save()) {
                return ['errors' => $this->errors];
            }

            // Create Book Record in the DB and Return newly created book with id
            return ['book_id' => $this->id];
        }
    }
