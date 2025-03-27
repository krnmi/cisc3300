<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function getPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getPosts();
        echo json_encode($posts);
        exit();
    }
}

