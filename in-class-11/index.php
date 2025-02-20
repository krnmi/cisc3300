<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'dogs' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $dogs = [
        [
            'name' => 'dogs!'
        ]
    ];

    echo json_encode($dogs);
    exit();
}

