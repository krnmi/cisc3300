<?php
header("Content-Security-Policy: script-src 'self' 'unsafe-eval'");
header("Access-Control-Allow-Origin: *");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'fake-business.php' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $inventory = [
        [
            'name' => 'coffee',
            'price' => '4.50'
        ],
        [
            'name' => 'matcha latte',
            'price' => '5.00'
        ],
        [
            'name' => 'cupcake',
            'price' => '4.00'
        ]
    ];

    echo json_encode($inventory);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'success'
    ]);
    exit();
}
?>



