<?php

namespace backend\controllers;

use backend\components\ActiveController;
use backend\resource\Post;

class PostController extends ActiveController
{
    public $modelClass = Post::class;

}
