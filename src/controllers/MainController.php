<?php

namespace ServeEase\controllers;
use ServeEase\models\ProductManager;
class MainController {
    function __construct() {
        
    }

    function showMain() {
        $ProductManager = new ProductManager();
        $ProductManager->recupProduct();
        require VIEWS . "main.php";
    }
}
?>