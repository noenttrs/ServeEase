<?php
namespace ServeEase\controllers;

use ServeEase\models\ProductManager;

class ProductController {

    public function showProduct() {
        $ProductManager = new ProductManager();
        $product = $ProductManager->recupProduct();
        require VIEWS . "shop/product.php";
    }

    public function addBasket() {
        $ProductManager = new ProductManager();
        $product = $ProductManager->recupProduct();
        require VIEWS . "shop/basket.php";
    }
}