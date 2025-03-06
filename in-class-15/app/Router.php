 <?php

namespace app;

require "..app/controllers/PostController.php";

use controllers\PostController;

class Router {
    public function handleRoutes() {
        $url = strtok($_SERVER["REQUEST_URI"], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        $postController = new PostController();

        if ($url === '/api/posts' && $method === 'GET') {
            $postController->getPosts();
        } elseif ($url === '/api/posts' && $method === 'POST') {
            $postController->savePost();
    
        }
        else {
            http_response_code(404);
            echo json_encode(['error' => 'error']);
            exit();
        }        
        
    }
}
