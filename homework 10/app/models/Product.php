<?php

namespace app\models;

use app\models\model;

class Product extends model {

    public function get_all_products_by_name_or_description($name, $description) {
        $query = "select * from products where name like :name or description like :description";
        return $this->query($query, [
            'name' => '%' . $name . '%',
            'description' => '%' . $description . '%',
        ]);
    }

    public function getAllProducts() {
        $query = "select * from products";
        return $this->query($query);
    }

    public function getProductByID($id) {
        $query = "select * from products where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveProduct($input_data) {
        $query = "insert into products (name, description, price) values (:name, :description, :price)";
        return $this->query($query, $input_data);
    }

    public function updateProduct($input_data) {
        $query = "update products set name = :name, description = :description, price = :price where id = :id";
        return $this->query($query, $input_data);
    }

    public function deleteProduct($input_data) {
        $query = "delete from products where id = :id";
        return $this->query($query, $input_data);
    }
}
