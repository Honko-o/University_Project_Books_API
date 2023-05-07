<?php

namespace backend\controllers;

use backend\components\ActiveController;
use backend\models\BookAuthor;
use backend\resource\Book;

class BookAuthorController extends ActiveController
{
    public $modelClass = BookAuthor::class;

}
