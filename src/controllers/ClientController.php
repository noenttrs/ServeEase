<?php

namespace ServeEase\controllers;

use ServeEase\models\ClientManager;
use ServeEase\models\Client;
class ClientController {
    function __construct() {

    }

    function showBasket() {
        foreach($_SESSION["basket"]["productItem"] as $productItem) {
            $product = $productManager->getProduct($productItem[0]);
            $product->setProductQuantity($productItem[1]);
            $basket[] = $product;
        }
        require VIEWS . "account/basket.php";
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
        $error = false;

        if(strlen($clientNameValue) > 50) {
            $clientName = "Le prénom ne doit pas dépasser 50 caractères";
            $error = true;
        }

        if(strlen($clientSurnameValue) > 50) {
            $clientSurname = "Le nom de famille ne doit pas dépasser 50 caractères";
            $error = true;
        }

        if(!filter_var($clientMailValue, FILTER_VALIDATE_EMAIL)){
            $clientMail = "L'adresse mail n'est pas valide";
            $error = true;
        }

        if(strlen($clientPasswordValue) < 8) {
            $clientPassword = "Le mot de passe doit contenir au moins 8 caractères";
            $error = true;
        }

        if(!preg_match("#[0-9]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins un chiffre";
            $error = true;
        }

        if(!preg_match("#[a-zA-Z]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins une lettre";
            $error = true;
        }

        if(!preg_match("#[\W]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins un caractère spécial (ex: !@#$%^&*)";
            $error = true;
        }

        if(!preg_match("#[A-Z]+#", $clientPasswordValue)) {
            $clientPassword = "Le mot de passe doit contenir au moins une majuscule";
            $error = true;
        }


        if($clientPasswordValue != $clientPasswordCorrespondanceValue) {
            $clientPasswordCorrespondance = "Les mots de passe ne correspondent pas";
            $error = true;
        }

        if(strlen($_POST["clientName"]) === 0 || strlen($_POST["clientSurname"]) === 0 || strlen($_POST["clientMail"]) === 0 || strlen($_POST["clientPassword"]) === 0 || strlen($_POST["clientRetypePassword"]) === 0) {
            $signupError = true;
            $error = true;
        }

        if($error) {
            require VIEWS . "gateway/signup.php";
            return;
        }

        $client = new Client();
        $client->setClientName($_POST["clientName"]);
        $client->setClientSurname($_POST["clientSurname"]);
        $client->setClientMail($_POST["clientMail"]);
        $client->setClientPassword(password_hash($_POST["clientPassword"], PASSWORD_DEFAULT));
        $client->setClientRole(0);
        $client->setClientFidelity(20);
        $clientManager = new ClientManager();
        if($clientManager->verifyClientMail($client->getClientMail())) {
            $clientMail = "L'adresse mail est déjà utilisée";
            require VIEWS . "gateway/signup.php";
            return;
        }
        $clientManager->saveClient($client);

        $client->setSession();
        header("Location: /");
    }

    function signin(){
        $clientManager = new ClientManager();
        $client = $clientManager->connectClient($_POST["clientMail"], $_POST["clientPassword"]);
        if($client === false) {
            $clientEmailValue = $_POST["clientMail"];
            $signinError = true;
            require VIEWS . "gateway/signin.php";
            return;
        } 
        $client->setSession();
        header("Location: /");
    }
    
    function logout() {
        session_destroy();
        header("Location: /");
    }
}
?>