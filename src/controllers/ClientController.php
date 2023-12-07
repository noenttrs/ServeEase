<?php

namespace ServeEase\controllers;
class ClientController {
    function __construct() {

    }

    function showSignup() {
        require VIEWS . "gateway/signup.php";
    }

    function signup() {
        $clientName = $_POST["clientName"];
        $clientSurname = $_POST["clientSurname"];
        $clientMail = $_POST["clientMail"];
        $clientPassword = $_POST["clientPassword"];
        $clientRetypePassword = $_POST["clientRetypePassword"];

        if ($clientPassword == $clientRetypePassword) {
            $client = new \ServeEase\models\Client($clientName, $clientSurname, $clientMail, $clientPassword);
            $client->save();
            header("Location: /");
        } else {
            header("Location: /signup");
        }
    }
}
?>