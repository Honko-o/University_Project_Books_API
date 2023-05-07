<?php

namespace backend\controllers;

use backend\models\OrderItems;
use backend\components\ActiveController;

class OrderItemsController extends ActiveController
{
    public $modelClass = OrderItems::class;

}
