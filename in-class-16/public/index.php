<?php
require_once "../app/error.php";

use app\error;

$errorCont = new ErrorCont();
$errorCont->viewErrors();
