<?php

namespace backend\controllers;

use backend\components\ActiveController;
use backend\resource\Book;

class BookController extends ActiveController
{
    public $modelClass = Book::class;

    public function behaviors()
    {
        return parent::behaviors();
    }
}
