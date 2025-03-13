<?php
require_once '../controller/controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $response = handleFormSubmission($title, $description);
}

include '../view/form.php';
?>
