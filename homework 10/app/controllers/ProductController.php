<?php

namespace app\controllers;

use app\models\Product;

class ProductController
{
    public function validateProduct($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $description = $inputData['description'];
        $price = $inputData['price'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'product name is too short';
            }
        } else {
            $errors['requiredName'] = 'product name is required';
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 10) {
                $errors['descriptionShort'] = 'product description is too short';
            }
        } else {
            $errors['requiredDescription'] = 'product description is required';
        }

        if ($price) {
            if (!is_numeric($price) || $price <= 0) {
                $errors['invalidPrice'] = 'price must be a positive number';
            }
        } else {
            $errors['requiredPrice'] = 'price is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        return [
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ];
    }

    public function getAllProducts() {
        $productModel = new Product();
        header("Content-Type: application/json");
        $products = $productModel->getAllProducts();

        echo json_encode($products);
        exit();
    }

    public function getProductByID($id) {
        $productModel = new Product();
        header("Content-Type: application/json");
        $product = $productModel->getProductById($id);
        echo json_encode($product);
        exit();
    }

    public function saveProduct() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'description' => $_POST['description'] ?: null,
            'price' => $_POST['price'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->saveProduct(
            [
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'description' => $_PUT['description'] ?: null,
            'price' => $_PUT['price'] ?: null,
        ];
        $productData = $this->validateProduct($inputData);

        $product = new Product();
        $product->updateProduct(
            [
                'id' => $id,
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteProduct($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $product = new Product();
        $product->deleteProduct(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function productsView() {
        include '../public/assets/views/product/product-view.html';
        exit();
    }

    public function productsAddView() {
        include '../public/assets/views/product/product-add.html';
        exit();
    }

    public function productsDeleteView() {
        include '../public/assets/views/product/product-delete.html';
        exit();
    }

    public function productsUpdateView() {
        include '../public/assets/views/product/product-update.html';
        exit();
    }