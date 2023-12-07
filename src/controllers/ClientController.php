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
        $clientNameValue = $_POST["clientName"];
        $clientSurnameValue = $_POST["clientSurname"];
        $clientMailValue = $_POST["clientMail"];
        $clientPasswordValue = $_POST["clientPassword"];
        $clientPasswordCorrespondanceValue = $_POST["clientRetypePassword"];

        if(strlen($clientNameValue) > 50) {
            $clientName = "Le prénom ne doit pas dépasser 50 caractères";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(strlen($clientSurnameValue) > 50) {
            $clientSurname = "Le nom de famille ne doit pas dépasser 50 caractères";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(!filter_var($clientMailValue, FILTER_VALIDATE_EMAIL)){
            $clientMail = "L'adresse mail n'est pas valide";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(strlen($clientPasswordValue) < 8) {
            $clientPassword = "Le mot de passe doit contenir au moins 8 caractères";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(!preg_match("#[0-9]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins un chiffre";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(!preg_match("#[a-zA-Z]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins une lettre";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(!preg_match("#[\W]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins un caractère spécial";
            require VIEWS . "gateway/signup.php";
            return;
        }

        if(!preg_match("#[A-Z]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins une majuscule";
            require VIEWS . "gateway/signup.php";
            return;
        }


        if($clientPasswordValue != $clientPasswordCorrespondanceValue) {
            $clientPasswordCorrespondance = "Les mots de passe ne correspondent pas";
            require VIEWS . "gateway/signup.php";
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