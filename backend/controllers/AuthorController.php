<?php

namespace backend\controllers;

use backend\models\Author;
use backend\components\ActiveController;

class AuthorController extends ActiveController
{
    public $modelClass = Author::class;
}
