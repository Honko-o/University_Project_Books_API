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
    }