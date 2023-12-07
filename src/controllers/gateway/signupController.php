<?php

namespace ServeEase\controllers\gateway;
class SignupController {
    function __construct() {

    }

    function showSignup() {
        require VIEWS . "gateway/signup.php";
    }
}
?>