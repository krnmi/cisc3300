<?php

namespace app\controllers;

require "./app/models/Post.php";

use app\controllers\PostController;

class PostController {
    public function getPosts() {
        $postModel = new Post();
        echo json_encode($postModel->getAllPosts());
        exit();
    }

    public function savePost() {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;

        if (!$title || !$description) {
            http_response_code(400);
            echo json_encode(['error' => 'title and description are missing.']);
            exit();
        }

        $postModel = new Post();
        $postModel->savePost(['title' => htmlspecialchars($title), 'description' => htmlspecialchars($description)]);
        echo json_encode(['status' => 'post saved!']);
        exit();
    }
}
