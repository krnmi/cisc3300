<?php

require 'classes/Drink.php';
use Coffee\classes\Drink;

$drink = new Drink('Latte', 4.50);
echo $drink->toJson();
