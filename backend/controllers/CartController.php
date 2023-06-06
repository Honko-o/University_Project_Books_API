<?php

    namespace backend\controllers;

    use backend\components\Controller;
    use backend\models\OrderItems;
    use backend\models\Order;
    use yii\filters\VerbFilter;


    class CartController extends Controller
    {
        public function behaviors()
        {
            $behaviors = parent::behaviors();

            $behaviors['verbs'] = [
                'class' => VerbFilter::class,
                'actions' => [
                    'add' => ['POST'],
                    'delete' => ['POST', 'DELETE'],
                ],
            ];
        }

        public function actionAdd() {
            // Retrieve Post Request book_id and quantity
            $bookId = $this->request->post('book_id');
            $quantity = $this->request->post('quantity');

            // Create New OrderItem
            $orderItem = new OrderItems();
            $orderItem->book_id = $bookId;
            $orderItem->quantity = $quantity;

            // Save the OrderItem in DB
            if ($orderItem->save()) {
                return ['success' => true];
            } else {
                return ['success' => false, 'error' => $orderItem->errors];
            }
        }

        public function actionDelete($id) {
            $userId = \Yii::$app->user->id;

            $cartItem = OrderItems::findOne(['id' => $id, 'order_id' => null, 'user_id' => $userId]);

            if ($cartItem !== null) {
                $cartItem->delete();
                return ['success' => true];
            } else {
                return ['success' => false, 'errors' => 'Cart Item Not Found!'];
            }
        }

    }
