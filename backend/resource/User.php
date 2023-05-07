<?php


    namespace backend\resource;


    class User extends \common\models\User
    {
        public function fields()
        {
            return ['username', 'email', 'status'];
        }

        public function extraFields()
        {
            return ['updated_at'];
        }
    }