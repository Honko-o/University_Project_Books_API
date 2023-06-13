<?php

namespace backend\controllers;

use backend\components\ActiveController;
use backend\models\Categories;

class CategoryController extends ActiveController
{
    public $modelClass = Categories::class;
}
