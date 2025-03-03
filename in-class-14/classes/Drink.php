<?php

namespace Coffee\classes;

class Drink {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function toJson() {
        return json_encode([
            'name' => $this->name,
            'price' => $this->price
        ]);
    }
}
