<?php

namespace ServeEase\controllers;

use ServeEase\models\ProductManager;
use ServeEase\models\Product;

class ProductController
{
    private $productManager;


    function __construct()
    {
        $this->productManager = new ProductManager();
    }

    // Pour afficher la page produit
    public function showProduct()
    {
        $ProductManager = new ProductManager();
        $product = $this->productManager->getAll();
        require VIEWS . "shop/product.php";
    }

    // Pour ajouter un produit au panier
    public function addBasket($id = null)
    {
        // unset ($_SESSION['basket'] );

        if ($id == null) {
            // Si il n'y a pas de panier en session 
            if (!isset($_SESSION["basket"])) {
                $_SESSION['basket'] = [];
                $_SESSION['basket']['productItem'] = [];
                array_push($_SESSION['basket']['productItem'], [$_POST['productId'], 1]);
            }
            // Si il y a deja un panier, on mets le produit dedans
            else {
                $compteur = 0;
                $trouve = false;
                //si le produit est déjà dedans on incrémente la quantité
                foreach ($_SESSION["basket"]["productItem"] as $productItem) {
                    if ($productItem[0] == $_POST['productId']) {
                        $_SESSION["basket"]["productItem"][$compteur][1] += 1;
                        $trouve = true;
                        $compteur += 1;
                    }
                }
                //sinon on met le produit dans le panier avec qte 1
                if ($trouve==false) {
                    array_push($_SESSION['basket']['productItem'], [$_POST['productId'], 1]);
                }
            }
        }
        if ($id != null) {
            $compteur = 0;
            foreach ($_SESSION["basket"]["productItem"] as $productItem) {
                if ($productItem[0] == $id) {
                    $_SESSION["basket"]["productItem"][$compteur][1] += 1;
                    $compteur += 1;
                }
            }
        }

        $this->showBasket();
    }


    function showBasket()
    {
        $basket = [];
        if (isset($_SESSION["basket"])) {
            foreach ($_SESSION["basket"]["productItem"] as $productItem) {
                $product = $this->productManager->getProductById(intval($productItem[0]));
                $product->setProductQuantity($productItem[1]);
                array_push($basket, $product);
            }
        }
        require VIEWS . "account/basket.php";
    }
}
