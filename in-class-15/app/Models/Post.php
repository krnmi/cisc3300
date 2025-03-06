class Post {
    public function getAllPosts() {
        return [
            ['id' => '1', 'title' => 'post 1', 'description' => 'this is post 1'],
            ['id' => '2', 'title' => 'post 2', 'description' => 'this is post 2'],
            ['id' => '3', 'title' => 'post 3', 'description' => 'this is post 3'],
        ];
    }

    public function savePost($data) {
        return true;
    }
}

