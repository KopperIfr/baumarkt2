<?php

class Warenkorb {
    private $products;
    private $total_price;

    public function __construct() {
        $this->products = [];
        $this->total_price = 0;
    }

    public function addProduct($product) {
        if($product !== false) {
            // 1. Verificar si hay productos en el carrito
            if(!isset($_SESSION['warenkorb'])) {
                $_SESSION['warenkorb'] = [];
                array_push($_SESSION['warenkorb'], $product);
                $this->updateTotalPrice();
                return true;
            }
            // 2. Verificar si existe el producto que estamos añadiendo
            $same_product_index = $this->findProductIndexById($product['id']);
            // Si ya existe el producto..
            if($same_product_index !== false) {
                $_SESSION['warenkorb'][$same_product_index]['menge'] += intval($product['menge']);
                $this->updateTotalPrice();
            // Si no existe el producto..
            } else {
                array_push($_SESSION['warenkorb'], $product);
                $this->updateTotalPrice();
            }
            return true;
        } else {
            return false;
        } 
    }

    private function findProductIndexById($id) {
        foreach ($_SESSION['warenkorb'] as $index => $product) {
            if($product['id'] === $id) {
                return $index;
            }
        }
        return false;
    }

    public function updateTotalPrice() {
        $total_price = 0;
        foreach ($_SESSION['warenkorb'] as $index => $product) {
            $price = floatval($product['price']) * floatval($product['menge']);
            $_SESSION['warenkorb'][$index]['total_price'] = $price;
            $total_price += $_SESSION['warenkorb'][$index]['total_price'];
        }
        $_SESSION['total_price'] = $total_price;
    }

    public function getTotalPrice() {
        return $_SESSION['total_price'];
    }

    public function getAllProducts() {
        return $_SESSION['warenkorb'];
    }

    public function removeProduct() {
        foreach ($_SESSION['warenkorb'] as $index => $product) {
            if($product['id'] === $_POST['product_id']) {
                unset($_SESSION['warenkorb'][$index]);
                break;
            }
        }
    }

}