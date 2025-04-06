<?php
namespace app\models;

use app\models\Model;

class Product extends Model {

    private function formatPrice($priceInCents) {
        return number_format($priceInCents / 100, 2);
    }

    public function searchProducts($query) {
        $sql = "SELECT * FROM products WHERE name LIKE :query OR category LIKE :query";
        $products = $this->query($sql, ['query' => '%' . $query . '%']);

        if ($products) {
            foreach ($products as &$product) {
                $product['price'] = $this->formatPrice($product['price']);
            }
        }

        return $products;
    }
}
?>
