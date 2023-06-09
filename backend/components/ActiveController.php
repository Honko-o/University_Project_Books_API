<?php

    namespace backend\components;

use backend\models\Order;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\VarDumper;
use yii\web\ForbiddenHttpException;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only' => ['create', 'delete', 'update'],
            'optional' => ['index', 'view'],
        ];

        return $behaviors;
    }

    /**
     * Checks the privilege of the current user.
     *
     * This method should be overridden to check whether the current user has the privilege
     * to run the specified action against the specified data model.
     * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
     *
     * @param string $action the ID of the action to be executed
     * @param Order $model the model to be accessed. If null, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
            throw new ForbiddenHttpException('You do not have permission to change this record');
        }
    }
}