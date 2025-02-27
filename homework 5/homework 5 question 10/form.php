<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $year = $_POST['year'];
    
    $response = array("message" => "success");
    
    echo json_encode($response);
}
?>
