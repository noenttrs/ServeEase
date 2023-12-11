<?php

namespace ServeEase\controllers;
use ServeEase\models\ProductManager;
class MainController {
    function __construct() {
        
    }

    function showMain() {
        $ProductManager = new ProductManager();
        $ProductManager->getProduct();
        require VIEWS . "main.php";
    }
}
?>