<?php

namespace ServeEase\controllers;
class MainController {
    function __construct() {

    }

    function showMain() {
        require VIEWS . "main.php";
    }
}
?>