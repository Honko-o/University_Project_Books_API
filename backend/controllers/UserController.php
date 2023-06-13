<?php

namespace backend\controllers;

use backend\resource\User;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\filters\VerbFilter;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = User::class;

    public function behaviors()
    {
        return [
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'signup' => ['POST'],
                    'login' => ['POST'],
                ],
            ],
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON
                ],
            ]
        ];
    }

    public function actionLogin() {
        $LoginFormModel = new LoginForm();
        $LoginFormModel->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($LoginFormModel->login()) {
            $user = User::findByUsername($LoginFormModel->username);
            $accessToken = $user->attributes['access_token'];

            return [
                'status' => 'Successful',
                'access_token' => $accessToken,
            ];
        } else {
            return $LoginFormModel;
        }
    }

    public function actionSignup() {
        $SignupModel = new SignupForm();
        $SignupModel->load(\Yii::$app->getRequest()->getBodyParams(), '');

        if ($SignupModel->signup()) {
            return ['success' => true];
        } else {

            return ['errors' => $SignupModel->errors];
        }
    }
}
