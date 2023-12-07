<?php

namespace ServeEase\controllers;
class ClientController {
    function __construct() {

    }

    function showSignup() {
        require VIEWS . "gateway/signup.php";
    }
}
?>