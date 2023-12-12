<?php

namespace ServeEase\controllers;
use ServeEase\models\ProductManager;
class MainController {
    function __construct() {
        
    }

    function showMain() {
        $ProductManager = new ProductManager();
        $ProductManager->getAll();
        require VIEWS . "main.php";
    }
}
?>