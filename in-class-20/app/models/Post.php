<?php

namespace app\models;

// Using the database class namespace
use app\models\Model;

class Post extends Model {

    public function getAllPostsByTitleOrEmail($title, $email) {
        $query = "select * from posts where title like :title or email like :email";
        return $this->query($query, [
            'title' => '%' . $title . '%',
            'email' => '%' . $email . '%',
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id) {
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData) {
        $query = "insert into posts (title, description, email) values (:title, :description, :email)";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData) {
        $query = "update posts set title = :title, description = :description, email = :email where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData) {
        $query = "delete from posts where id = :id";
        return $this->query($query, $inputData);
    }
}
