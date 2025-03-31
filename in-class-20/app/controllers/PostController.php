<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function validateUser($inputData) {
        $errors = [];
        $titleName = $inputData['title'];
        $postDesc = $inputData['description'];
        $email = $inputData['email'];

        if ($titleName) {
            $titleName = htmlspecialchars($titleName, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($titleName) < 2) {
                $errors['titleShort'] = 'title is too short';
            }
        } else {
            $errors['requiredTitle'] = 'title is required';
        }

        if ($postDesc) {
            $postDesc = htmlspecialchars($postDesc, ENT_QUOTES | ENT_HTML5, 'UTF-8', true);
            if (strlen($postDesc) < 2) {
                $errors['postDescShort'] = 'description is too short';
            }
        } else {
            $errors['requiredPostDesc'] = 'description is required';
        }

        if ($email) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['invalidEmail'] = 'email is invalid.';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'title' => $titleName,
            'description' => $postDesc,
            'email' => $email,
        ];
    }

    public function getAllPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostById($id) {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getPostById($id);
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        $inputData = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'email' => $_POST['email'],
        ];
        $postData = $this->validateUser($inputData);

        $post = new Post();
        $post->savePost([
            'title' => $postData['title'],
            'description' => $postData['description'],
            'email' => $postData['email'],
        ]);

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'title' => $_PUT['title'],
            'description' => $_PUT['description'],
            'email' => $_PUT['email'],
        ];
        $postData = $this->validateUser($inputData);

        $post = new Post();
        $post->updatePost([
            'id' => $id,
            'title' => $postData['title'],
            'description' => $postData['description'],
            'email' => $postData['email'],
        ]);

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $post = new Post();
        $post->deletePost([
            'id' => $id,
        ]);

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function postsView() {
        include '../public/assets/views/user/users-view.html';
        exit();
    }

    public function postsAddView() {
        include '../public/assets/views/user/users-add.html';
        exit();
    }

    public function postsDeleteView() {
        include '../public/assets/views/user/users-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include '../public/assets/views/user/users-update.html';
        exit();
    }
}
