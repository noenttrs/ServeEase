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
    public function showProduct($productId)
    {
        $ProductManager = new ProductManager();
        $product = $this->productManager->getProductById($productId);
        require VIEWS . "shop/product.php";
    }

    // Pour afficher la page produit
    public function showAllProduct()
    {
        $ProductManager = new ProductManager();
        $product = $this->productManager->getAll();
        require VIEWS . "shop/allProduct.php";
    }

    // Pour ajouter un produit au panier
    public function addBasket($productId = null)
    {
        // Si aucun ID n'a été envoyé
        if (!isset($productId)) {
            // si un ID et une quantité ont été envoyés ($_POST)
            if (isset($_POST['productId'], $_POST['productQuantity'])) {
                // Si la session basket n'existe pas, on la créée
                if (!isset($_SESSION["basket"])) {
                    $_SESSION['basket'] = [];
                    $_SESSION['basket']['productItem'] = [];
                }

                $trouve = false;
                // on parcours le panier pour voir si le produit existe déjà
                foreach ($_SESSION["basket"]["productItem"] as &$productItem) {
                    // Si le produit existe déjà, on incrémente la quantité
                    if ($productItem[0] == $_POST['productId']) {
                        $productItem[1] += 1;
                        // On passe la variable à true pour ne pas ajouter le produit à la fin et on sort de la boucle
                        $trouve = true;
                        break;
                    }
                }

                // Si le produit n'existe pas, on l'ajoute au panier
                if (!$trouve) {
                    $_SESSION['basket']['productItem'][] = [$_POST['productId'], $_POST['productQuantity']];
                }
            }
        // Si un ID a été envoyé
        } else {
            // on parcours le panier pour voir si le produit existe déjà et incrémenter la quantité
            foreach ($_SESSION["basket"]["productItem"] as &$productItem) {
                if ($productItem[0] == $productId) {
                    $productItem[1] += 1;
                    break;
                }
            }
        }

        $this->showBasket();
    
    }

    // Pour enlever un produit au panier
    public function minusBasket($id = null)
    {
        if ($id !== null) {
            $counter = 0;
            foreach ($_SESSION["basket"]["productItem"] as &$productItem) {
                if ($productItem[0] == $id) {
                    if ($productItem[1] > 1) {
                        $productItem[1] -= 1;
                    }
                    break; // On sort de la boucle
                }
                // On incrémente le compteur après la boucle pour ne pas avoir de problème avec le unset, c'est à dire que si on supprime un produit, le compteur ne s'incrémente pas
                $counter += 1;
            }
        }

        $this->showBasket();
    }


    // Pour suprimer un produit au panier
    public function delete($id = null)
    {
        if ($id !== null) {
            $counter = 0;
            foreach ($_SESSION["basket"]["productItem"] as $key => $productItem) {
                // Si l'id du produit est trouvé
                if ($productItem[0] == $id) {
                    // on enleve le produit du panier
                    unset($_SESSION['basket']["productItem"][$key]);
                    break; // on sort de la boucle
                }
                // On incrémente le compteur après la boucle pour ne pas avoir de problème avec le unset, c'est à dire que si on supprime un produit, le compteur ne s'incrémente pas
                $counter += 1;
            }

            // on réindexe le tableau pour ne pas avoir de trou dans les index à cause du unset(), en utilisant array_values()
            $_SESSION['basket']["productItem"] = array_values($_SESSION['basket']["productItem"]);
        }

        $this->showBasket();
    }


//    public function delete($id = null)
//    {
//        if ($id != null) {
//            $compteur = 0;
//            foreach ($_SESSION["basket"]["productItem"] as $productItem) {
//                // Si l'id du produit est trouvé
//                if ($productItem[0] == $id) {
//                    // On enleve le produit du panier
//                    unset($_SESSION['basket']["productItem"][$compteur]);
//                    $compteur += 1;
//                }
//            }
//        }
//        $this->showBasket();
//    }


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