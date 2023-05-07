<?php

namespace backend\controllers;

use Yii;
use yii\helpers\VarDumper;
use backend\components\Controller;
use backend\models\BookCategories;
use backend\components\ActiveController;
use backend\resource\Book;

class BookController extends Controller
{
    public $modelClass = Book::class;

    public function actionCreateBook() {
        $data = Yii::$app->request->getBodyParams();
        $model = new Book();

        if ($model->load($data, '') && $model->save()) {
            // Create Book Record in the DB
            // Return newly created book with id
            return ['book_id' => $model->id];
        }

        return ['errors' => $model->errors];
    }
}
