<?php
namespace app\controllers;

use app\models\Product;

class ProductController
{
    public function search()
    {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $productModel = new Product();
        $products = [];
        if ($searchTerm) {
            $products = $productModel->searchProducts($searchTerm);
        }
        $productListHtml = '';
        if ($products) {
            foreach ($products as $product) {
                $productListHtml .= "<li><strong>{$product['name']}</strong><br>Category: {$product['category']}<br>Price: $ {$product['price']}</li>";
            }
        } else {
            $productListHtml = '<li>No products found.</li>';
        }
        include $_SERVER['DOCUMENT_ROOT'] . '/views/product_search.php';  // Correct path
    }
}
?>

