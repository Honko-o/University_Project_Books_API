<?php

    namespace backend\resource;

    use yii\behaviors\BlameableBehavior;
    use yii\behaviors\TimestampBehavior;

    class Post extends \backend\models\Post
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