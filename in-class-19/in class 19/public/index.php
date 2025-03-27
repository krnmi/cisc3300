<?php
require_once "../app/models/Model.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/PostController.php";

$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\PostController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->getPostByID($id); 
    } else {
        $postController->getPosts(); 
    }
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->postDetailsView();
    } else {
        $postController->postsView(); 
}

include '../public/assets/views/notFound.html';
exit();

?>
