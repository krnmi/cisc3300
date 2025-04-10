<?php
require_once "../app/models/Model.php";
require_once "../app/models/Product.php"; 
require_once "../app/controllers/ProductController.php"; 

$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\ProductController; 

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null; 
    $productController = new ProductController();

    if ($id) {
        $productController->getProductByID($id); 
    } else {
        $productController->getAllProducts(); 
    }
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $productController = new ProductController();
    $productController->saveProduct();
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $productController = new ProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController->updateProduct($id); 

}

if ($uriArray[1] === 'api' && $uriArray[2] === 'products' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $productController = new ProductController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $productController->deleteProduct($id); 
}

if ($uriArray[1] === 'add-products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsAddView();
}

if ($uriArray[1] === 'edit-products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsUpdateView(); 
}

if ($uriArray[1] === 'delete-product' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsDeleteView(); 
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $productController = new ProductController();
    $productController->productsView(); 
}

include '../public/assets/views/notFound.html