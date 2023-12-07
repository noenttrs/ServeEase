<?php

namespace ServeEase\controllers;

use ServeEase\models\ClientManager;
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
            $client = new ClientManager();
            $client->saveClient();
            header("Location: /");
        } else {
            header("Location: /signup");
        }
    }
}
?>