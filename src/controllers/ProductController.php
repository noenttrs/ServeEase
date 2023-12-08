<?php
namespace ServeEase\controllers;

use ServeEase\models\ProductManager;

class ProductController {

    public function showProduct() {
        $ProductManager = new ProductManager();
        $ProductManager->recupProduct();
        require VIEWS . "shop/product.php";
    }
}