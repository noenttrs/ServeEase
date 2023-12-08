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
            $clientPassword = "Le mot de passe doit contenir au moins un caractère spécial (ex: !@#$%^&*)";
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

        if(!isset($_POST["clientName"]) || !isset($_POST["clientSurname"]) || !isset($_POST["clientMail"]) || !isset($_POST["clientPassword"]) || !isset($_POST["clientRetypePassword"])) {
            $clientError = "Veuillez remplir tous les champs";
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