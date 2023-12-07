<?php

namespace ServeEase\controllers;

use ServeEase\models\ClientManager;
use ServeEase\models\Client;
class ClientController {
    function __construct() {

    }

    function showSignup() {
        require VIEWS . "gateway/signup.php";
    }

    function showSignin() {
        require VIEWS . "gateway/signin.php";
    }

    function signup() {

        if($_POST["clientPassword"] != $_POST["clientRetypePassword"]) {
            echo "Les mots de passe ne correspondent pas";
            return;
        }
        $client = new Client();
        $client->setClientName($_POST["clientName"]);
        $client->setClientSurname($_POST["clientSurname"]);
        $client->setClientMail($_POST["clientMail"]);
        $client->setClientPassword($_POST["clientPassword"]);
        $client->setClientRole(0);
        $client->setClientFidelity(20);

        $clientManager = new ClientManager();
        $clientManager->saveClient($client);

        $_SESSION["client"] = $client->session();
        header("Location: /");
    }

    function signin(){
        $clientManager = new ClientManager();
        $client = $clientManager->connectClient($_POST["clientMail"], $_POST["clientPassword"]);
        $isValidClient = count($client);
        if($isValidClient < 1) {
            echo "Le compte n'existe pas";
            return;
        } 
        // $_SESSION["client"] = $isValidClient->session();
        header("Location: /");
    }
    
    function logout() {
        session_destroy();
        header("Location: /");
    }
}
?>