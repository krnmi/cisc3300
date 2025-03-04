<?php
$associativeArray = array(
    "latte" => "$4.00",
    "cappuccino" => "$3.00",
    "frappe" => "$4.50"
);

foreach ($associativeArray as $drink => $price) {
    echo "$drink: $price<br>";
}

function myFunction(string $coffeeType, int $quantity, string $size = "regular"): string {
    return "$coffeeType, $quantity, $size";
}

echo myFunction("iced coffee", 2);
?>
