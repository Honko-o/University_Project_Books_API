<?php

namespace backend\controllers;

use Yii;
use backend\components\ActiveController;
use backend\models\FavoriteBook;

class FavoriteBookController extends ActiveController
{
    public $modelClass = FavoriteBook::class;

    // Override the base `actions()` method to remove the default CRUD actions
    public function actions()
    {
        $actions = parent::actions();

        unset($actions['create'], $actions['delete'], $actions['update']);

        return $actions;
    }

    public function actionCreate()
    {
        $model = new FavoriteBook();
        $model->user_id = Yii::$app->user->id;
        $model->book_id = Yii::$app->request->post('book_id');

        if ($model->save()) {
            return $model;
        } else {
            return $model->getErrors();
        }
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return ['message' => 'Book Removed from favorite successfully.'];
    }

    // Helper method to find the FavoriteBook model
    /**
     * @param $id
     * @return mixed
     */
    protected function findModel($id)
    {
        $model = FavoriteBook::findOne(['book_id' => $id, 'user_id' => Yii::$app->user->id]);

        if ($model === null) {
            throw new NotFoundHttpException('Favorite book not found.');
        }

        return $model;
    }
}
