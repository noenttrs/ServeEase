<?php
namespace ServeEase\controllers;

use ServeEase\models\ProductManager;

class ProductController {


    function __construct() {
        
    }

    // Pour afficher la page produit
    public function showProduct() {
        $ProductManager = new ProductManager();
        $product = $ProductManager->getProduct();
        require VIEWS . "shop/product.php";
    }

    // Pour ajouter un produit au panier
    public function addBasket() {
        if(empty($_SESSION['basket'])){
            $_SESSION['basket'] = [];
            $_SESSION['basket']['productItem'] = [$_POST['productId'], $_POST['productQuantity']];
        } else {

            array_push($_SESSION['basket']['productItem'], [$_POST['productId'], $_POST['productQuantity']]);
        }
        
    }
}
