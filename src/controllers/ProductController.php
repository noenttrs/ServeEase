<?php
namespace ServeEase\controllers;

use ServeEase\models\ProductManager;
use ServeEase\models\Product;

class ProductController {
    private $productManager;


    function __construct() {
        $this->productManager = new ProductManager();
    }

    // Pour afficher la page produit
    public function showProduct() {
        $ProductManager = new ProductManager();
        $product = $this->productManager->getAll();
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
        $this->showBasket();
    }

    
    function showBasket() {
        // foreach($_SESSION["basket"]["productItem"] as $productItem) {
        //     $product = new Product();
        //     $product = $this->productManager->getProductById($productItem[0]);
        //     var_dump($product); exit();
        //     $product->set
        //     $basket[] = $product;
        // }
        require VIEWS . "account/basket.php";
    }

}
