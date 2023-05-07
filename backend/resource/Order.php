<?php

    namespace backend\resource;

    use yii\behaviors\TimestampBehavior;
    use yii\behaviors\BlameableBehavior;

    class Order extends \backend\models\Order
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