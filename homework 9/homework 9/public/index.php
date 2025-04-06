<?php

require_once '../app/config.php';
require_once '../app/models/Model.php';
require_once '../app/models/Product.php';
require_once '../app/controllers/ProductController.php';

$controller = new \app\controllers\ProductController();
$controller->search();
