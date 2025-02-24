<?php
if ($_SERVER['REQUEST_URI'] == '/html') {
    echo '<!DOCTYPE html>
          <html lang="en">
          <head>
              <title>html</title>
          </head>
          <body>
              <h1>this is html</h1>
          </body>
          </html>';
} elseif ($_SERVER['REQUEST_URI'] == '/json') {
    header('Content-Type: application/json');
    $data = array("message" => "this is json");
    echo json_encode($data);
} else {
}
?>
